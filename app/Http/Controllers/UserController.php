<?php

namespace App\Http\Controllers;

use Tinify\Tinify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Http\Requests\LoginRequest;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users/all",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */
    public function index()
    {
        // $users = User::all();
        $users = DB::table('users')->select(['id', 'name', 'email', 'role'])->get();

        return response()->json($users, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ]);

        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'image' => '',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrfail($id);
        return response()->json($user, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return response()->json($user, 201);
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     * Login with email and password.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Echec erreur']);
    }

    public function users()
    {
        $user = Auth::user();
        return view('auth.user')->with('user', $user);
    }

    public function profile()
    {
        $user = Auth::user();

        return view('auth.profile')->with('user', $user);

    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // Configuration de l'API Tinify avec votre clé d'API
            Tinify::setKey('sqmn27fBzM3MH5VvMpCGRfCxWZpChn0r');
            // Obtention du fichier téléchargé depuis la requête

            // Obtention du fichier téléchargé depuis la requête
            $image = $request->file('image');

            // Compression de l'image avec Tinify
            $compressedImage = \Tinify\fromFile($image->path())->toBuffer();

            // Génération d'un nom unique pour le fichier compressé
            $compressedFileName = 'compressed_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Stockage du fichier compressé dans le dossier 'profil' du répertoire 'public'
            $destinationPath = 'profil/' . $compressedFileName;
            Storage::put('public/' . $destinationPath, $compressedImage);

            // Mise à jour du champ 'profile_picture' dans la table 'users'
            auth()->user()->update([
                'image' => $destinationPath,
            ]);

            return redirect('/user/profile')->with('success', 'Profil mis à jour avec succès.');

        }
        return redirect('/user/profile')->back()->with('error', 'Aucune image téléchargée.');

    }

    public function userProfile()
    {
        $user = Auth::user();
        return view('auth.store')->with('user', $user);
    }

}

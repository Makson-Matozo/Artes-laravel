<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Arte;
use App\Models\User;


class ArteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        try {
            $message = Session::get("message");
            $artes = DB::select("SELECT artes.*, 
            users.name 
        FROM artes 
        JOIN users ON artes.Users_id = users.id");
            return view("arte.index")->with("artes", $artes)->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return view("arte.index")->with("artes", [])->with("message", $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view("arte.create");
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $arte = new Arte();
            $arte->Users_id = 1; 
            $arte->titulo = $request->titulo;
            $arte->descricao = $request->descricao;
            $arte->categoria = $request->categoria;
            $arte->urlImage = "/img-default/default.png";
            $arte->save();
            $arte->updateImage($request, "imagem");
            DB::commit(); 
            $message = ["Arte cadastrado com sucesso!", "success"];
            return redirect()->route("arte.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); 
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $arte = Arte::find($id);
            if ($arte) {
                return view("arte.show")->with("arte", $arte);
            }
            $message = ["Arte $id não encontrada", "warning"];
            return redirect()->route("arte.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $arte = Arte::find($id);
            if ($arte) {
                $users = User::all();
                return view("arte.edit")->with("arte", $arte)->with("users", $users);
            }
            $message = ["Arte $id não encontrada", "warning"];
            return redirect()->route("arte.index")->with("message", $message);
        } catch (\Throwable $th) {
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::beginTransaction(); // Inicia a transação
        try {
            $arte = Arte::find($id);
            if (isset($arte)) {
                $arte->titulo = $request->titulo;
                $arte->descricao = $request->descricao;
                $arte->categoria = $request->categoria;
                $arte->update();
                $arte->updateImage($request, "imagem");

                DB::commit(); // Confirma a transação
                $message = ["Arte $id atualizada com sucesso", "success"];
                return redirect()->route("arte.index")->with("message", $message);
            }

            DB::commit();
            $message = ["Arte $id não encontrada", "warning"];
            return redirect()->route("arte.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack(); // Desfaz a transação em caso de erro
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $arte = Arte::find($id);
            if ($arte) {
                $arte->delete();
            }
            DB::commit();
            $message = ["Arte $id removida com sucesso", "success"];
            return redirect()->route("arte.index")->with("message", $message);
        } catch (\Throwable $th) {
            DB::rollBack();
            $message = [$th->getMessage(), "danger"];
            return redirect()->route("arte.index")->with("message", $message);
        }
    }
}

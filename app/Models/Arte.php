<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Arte extends Model
{
    use HasFactory;

    /**
     * Atualiza a imagem associada à arte, removendo a imagem anterior, se necessário, e salvando a nova imagem enviada.
     * @param \Illuminate\Http\Request $request O objeto da requisição contendo os dados enviados, incluindo a imagem.
     * @param string $name O nome do campo da imagem no formulário de envio.
     */
    public function updateImage($request, $name)
    {
        if ($request->hasFile($name)) {
            $diretorioImagemAntiga = dirname($this->urlImage);
            
            if ($diretorioImagemAntiga != "/img-default") {
                $imagemAntiga = public_path($this->urlImage);
                if (File::exists($imagemAntiga)) {
                    File::delete($imagemAntiga);
                }
            }
            
            $imagem = $request->file($name);
            [$segundos, $microsegundos] = explode(".", microtime(true));
            $nomeImagem = $this->nome . date("-Y-m-d-") . $segundos . "-" . $microsegundos . "." . $imagem->getClientOriginalExtension();
            $caminhoImagem = public_path("/img/artes");
            $this->urlImage = "/img/artes/$nomeImagem";
            $this->update();
            $imagem->move($caminhoImagem, $nomeImagem);
        }
    }

    public function removeImage()
    {
        $diretorioImagemAntiga = dirname($this->urlImage);
        
        if ($diretorioImagemAntiga != "/img-default") {
            $imagemAntiga = public_path($this->urlImage);
            if (File::exists($imagemAntiga)) {
                File::delete($imagemAntiga);
            }
        }
    }

    
}


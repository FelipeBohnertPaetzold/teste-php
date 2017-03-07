<?php
/**
 * Class Troco
 * Classe para calcular a quantidade de notas necessárias para um determinado valor em Reais.
 * Suporta centavos.
 */
class Troco
{
    /**
     * Dado um valor em reais, retorna a quantidade de notas necessárias para formar o troco.
     *
     * @param $reais Valor em reais, podendo conter centavos.
     * @return array Quantidade de notas, indexada pelo seu valor.
     */
    
    //funcao que calcula a quantidade de notas que serão devolvidas no troco
    private function calculaReais($valor, $qtdeNotas)
    {
      //o foreach percorre todas as posicoes no array
      foreach ($qtdeNotas as $notas => $quantidade) {
        //aqui pego a nota atual que esta no foreach
        $nota_atual = ((float) $notas);
        //aqui converto a nota atual para string, ela sera o nome da chave no array
        $posicao_array = ((string) $nota_atual);

        //esse laço decrementa o valor até chegar a zero, dessa forma atribuo os valores a partir do foreach
        //evito assim a criacao de uma condicional if para cada chave do array
        while($valor >= $nota_atual){
          $qtdeNotas[$posicao_array] ++;
          $valor = sprintf("%f.2", $valor - $nota_atual);
          
        }
      }
      return $qtdeNotas;
    }

    public function getQtdeNotas($reais)
    {
        $qtdeNotas = [
          '100' => 0,
           '50' => 0,
           '20' => 0,
           '10' => 0,
            '5' => 0,
            '2' => 0,
            '1' => 0,
          '0.5' => 0,
         '0.25' => 0,
          '0.1' => 0,
          '0.05' => 0,
         '0.01' => 0,
        ];

        //não costumo colocar muitas funcionalidades na mesma função
        return $this->calculaReais(((float)$reais), $qtdeNotas);
    }
}
<?php
class Sorteio
{

    // Requisito 1
    private $quantidadeDezenas;
    private $resultado;
    private $totalJogos;
    private $jogos;

    // Requisito 3
    public function __construct($quantidadeDezenas, $totalJogos)
    {
        $this->setQuantidadeDezenas($quantidadeDezenas);
        $this->setTotalJogos($totalJogos);
    }

    // Requisito 2
    // GET e SET atributo $quantidadeDezenas
    public function getQuantidadeDezenas()
    {
        return $this->quantidadeDezenas;
    }

    public function setQuantidadeDezenas($quantidadeDezenas)
    {
        if (array_search($quantidadeDezenas, array(6, 7, 8, 9, 10)))
        {
            $this->quantidadeDezenas = $quantidadeDezenas;
        }
        else
        {
            throw new Exception('A quantidade de dezenas deve ser 6, 7, 8, 9 ou 10!');
        }
    }

    // GET e SET atributo $resultado
    public function getResultado()
    {
        return $this->resultado;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    // GET e SET atributo $totalJogos
    public function getTotalJogos()
    {
        return $this->totalJogos;
    }

    public function setTotalJogos($totalJogos)
    {
        $this->totalJogos = $totalJogos;
    }

    // GET e SET atributo $jogos;
    public function setJogos($jogos)
    {
        $this->jogos = $jogos;
    }

    public function getJogos()
    {
        return $this->jogos;
    }

    // Requisito 4
    private function geraNumeros()
    {
        //Criando array para sorteio de 1 a 60
        $intervalo = array_combine(range(1, 60), range(1, 60));

        // Gera os números aleatorios
        $numeros = array_rand($intervalo, $this->getQuantidadeDezenas());

        // Ordena os numeros
        sort($numeros);

        return $numeros;
    }


    // Requisito 5
    public function retornaQtdJogos()
    {
        $jogos = array();

        for ($i = 0; $i < $this->getTotalJogos(); $i++) {
            array_push($jogos, $this->geraNumeros());
        }

        $this->setJogos($jogos);
    }

    // Requisito 6
    public function retornaSorteio()
    {
        //Criando array para sorteio de 1 a 60
        $intervalo = array_combine(range(1, 60), range(1, 60));

        // Gera os números aleatorios
        $numeros = array_rand( $intervalo, 6);

        // Ordena os numeros
        sort($numeros);

        $this->setResultado($numeros);
    }

    // Requisito 7
    public function validaResultados()
    {
        $htmlTabela = '<table id="table-sorteio">'.
                        '<thead>'.
                            '<tr>'.
                                '<th colspan="' . $this->getQuantidadeDezenas() . '">Jogos</td>'.
                                '<th>Acertos</td>'.
                            '</tr>'.
                        '</thead>'.
                        '<tbody>';

        foreach ($this->getJogos() as $jogos) {

            $htmlTabela .= '<tr>';
            foreach ($jogos as $numero) {
                $htmlTabela .= '<td>' . $numero . '</td>';
            }
            $htmlTabela .= '<td><b>' . count(array_intersect($jogos, $this->getResultado())) . '</b></td>';
            $htmlTabela .= '</tr>';
        }

        $htmlTabela .=  '</tbody>'.
                        '</table>';

        return $htmlTabela;
    }
}

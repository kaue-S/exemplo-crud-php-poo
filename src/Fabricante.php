<?php
namespace ExemploCrudPoo;
use PDO;

    final class Fabricante {
        private int $id;
        private string $nome;

        // esta propriedade receberá os recursos PDO através da classe banco
        private PDO $conexao;

        public function __construct() {
            //no momento em que um objeto  fabricante for criado, automaticamente será feita a chamada do método "conecta" existente na classe banco.
            $this->conexao = Banco::conecta();
        }

        public function getId(): int {
                return $this->id;
        }

        public function setId(int $id): self {
                $this->id = $id;
                return $this;
        }

        public function getNome(): string {
                return $this->nome;
        }

        public function setNome(string $nome): self {
                $this->nome = $nome;

                return $this;
        }
    }
?>
<?php
    namespace ExemploCrudPoo;
    use PDO, Exception;

    final class Produto {
        private int $id;
        private string $nome;
        private string $descricao;
        private float $preco;
        private int $quantidade;
        private int $fabricanteId;

        private PDO $conexao;

        public function __construct() {
            //no momento em que um objeto produto for criado, automaticamente será feita a chamada do método "conecta" existente na classe banco.
            $this->conexao = Banco::conecta();
        }

        function lerProdutos():array {
            $sql = "SELECT 
                        produtos.id,
                        produtos.nome AS produto,
                        produtos.preco,
                        produtos.quantidade,
                        fabricantes.nome AS fabricante,
                        (produtos.preco * produtos.quantidade) AS total
                    FROM produtos INNER JOIN fabricantes
                    ON produtos.fabricante_id = fabricantes.id
                    ORDER BY produto";
        
            try {
                $consulta = $this->conexao->prepare($sql);
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $erro) {
                die("Erro ao carregar produtos: ".$erro->getMessage());
            }
            
            return $resultado;
        }

        public function getId(): int {
                return $this->id;
        }

        public function setId(int $id): self {
                $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

                return $this;
        }

        //================================

        public function getNome(): string {
                return $this->nome;
        }

        public function setNome(string $nome): self {
                $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

                return $this;
        }

        //==================================

        public function getDescricao(): string {
                return $this->descricao;
        }

        public function setDescricao(string $descricao): self {
                $this->descricao =  filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);

                return $this;
        }

    
        //=======================================


        public function getPreco(): float {
                return $this->preco;
        }

        public function setPreco(float $preco): self {
                $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT);

                return $this;
        }

        //=============================================


        public function getQuantidade(): int {
                return $this->quantidade;
        }

        public function setQuantidade(int $quantidade): self
        {
                $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);

                return $this;
        }

        //=============================================

        public function getFabricanteId(): int {
                return $this->fabricanteId;
        }

        public function setFabricanteId(int $fabricanteId): self {
                $this->fabricanteId = filter_var($fabricanteId, FILTER_SANITIZE_NUMBER_INT);

                return $this;
        }
    }
?>
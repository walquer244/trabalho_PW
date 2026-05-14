<?php 

// $host = "localhost";
// $dbname = "STeventos";
// $user = "root";
// $pass = "";

// $query = new PDO("mysql:host=$host,dbname=$dbname", $user, $pass);

define('DB_HOST',    'mysql');          
define('DB_NOME',    'steventos');      
define('DB_USUARIO', 'root');   
define('DB_SENHA',   ''); 
define('DB_CHARSET', 'utf8mb4');

/**
 * Cria e retorna uma conexão com o banco de dados usando PDO.
 *
 * O QUE É PDO?
 * PDO (PHP Data Objects) é a forma moderna e SEGURA de conectar
 * ao banco de dados em PHP. Suas principais vantagens são:
 *   1. Suporta múltiplos bancos (MySQL, PostgreSQL, SQLite, etc.)
 *   2. Usa "Prepared Statements" que protegem contra SQL Injection
 *   3. Lança exceções em caso de erro, facilitando o tratamento
 *
 * @return PDO Objeto de conexão pronto para executar consultas
 */
function getConexao(): PDO
{
    // DSN (Data Source Name): string que descreve onde o banco está
    // Formato MySQL: "mysql:host=SERVIDOR;dbname=BANCO;charset=CHARSET"
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NOME . ";charset=" . DB_CHARSET;

    // Opções de configuração do PDO
    $opcoes = [
        // Faz o PDO lançar uma exceção (PDOException) quando ocorrer erro.
        // Sem isso, erros seriam silenciosos e difíceis de detectar.
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        // Define que cada linha do resultado retorna como array associativo.
        // Assim acessamos: $linha['nome'] em vez de $linha[0]
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        // Desativa a emulação de prepared statements.
        // Garante que o MySQL processe os parâmetros de forma SEGURA.
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        // Tenta criar a conexão com as configurações acima.
        // O construtor PDO recebe: DSN, usuário, senha e opções.
        $pdo = new PDO($dsn, DB_USUARIO, DB_SENHA, $opcoes);

        // Se chegou até aqui, a conexão foi criada com sucesso!
        // Retornamos o objeto PDO para quem chamar esta função.
        return $pdo;

    } catch (PDOException $e) {
        // Se algo deu errado (banco offline, senha errada, etc.),
        // o PDO lança uma PDOException que capturamos aqui.

        // die() para a execução do PHP e exibe a mensagem.
        // ATENÇÃO: Em produção, NUNCA exiba detalhes técnicos para o usuário!
        // Registre o erro em um log e mostre uma mensagem genérica.
        die("Erro de conexão com o banco de dados: " . $e->getMessage());
    }
}
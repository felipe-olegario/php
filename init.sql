CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    marca VARCHAR(255),
    sabor VARCHAR(255),
    peso VARCHAR(255),
    preco INT(11),
    precoOriginal INT(11),
    precoMedio INT(11),
    estoque INT(11)
);

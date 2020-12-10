CREATE DATABASE casabd;

USE casabd;

CREATE TABLE tbl_func (
    fun_cod INTEGER AUTO_INCREMENT PRiMARY KEY,
    fun_cargo VARCHAR(20) NOT NULL,
    fun_nome VARCHAR(40) NOT NULL,
    fun_data_nasc DATE NOT NULL
);

CREATE TABLE tbl_cliente (
    cli_cpf VARCHAR(14) PRiMARY KEY,
    cli_nome VARCHAR(40) NOT NULL,
    cli_email VARCHAR(100) NOT NULL,
    cli_senha VARCHAR(32) NOT NULL,
    cli_cep VARCHAR(15) NOT NULL,
    cli_end VARCHAR (40) NOT NULL,
    cli_tel VARCHAR(14) NOT NULL
);

CREATE TABLE tbl_categoria (
    cat_cod INTEGER AUTO_INCREMENT PRiMARY KEY,
    cat_nome VARCHAR(40) NOT NULL
);

CREATE TABLE tbl_moveis (
    mov_cod INTEGER PRIMARY KEY,
    cat_cod INTEGER NOT NULL,
    mov_desc VARCHAR(50) NOT NULL,
    mov_price NUMERIC NOT NULL,
    mov_qtd NUMERIC NOT NULL,
    mov_img VARCHAR(200) NOT NULL,
    FOREIGN KEY(cat_cod) REFERENCES tbl_categoria(cat_cod)
);

CREATE TABLE tbl_reserva (
    rev_cod INTEGER AUTO_INCREMENT PRiMARY KEY,
    rev_data DATE NOT NULL,
    mov_cod INTEGER NOT NULL,
    cli_cpf VARCHAR(14) NOT NULL,
    FOREIGN KEY(mov_cod) REFERENCES tbl_moveis(mov_cod),
    FOREIGN KEY(cli_cpf) REFERENCES tbl_cliente(cli_cpf)
);

CREATE TABLE tbl_armazena(
    rev_cod INTEGER,
    mov_cod INTEGER,
    PRIMARY KEY(rev_cod, mov_cod),
    FOREIGN KEY(rev_cod) REFERENCES tbl_reserva(rev_cod),
    FOREIGN KEY(mov_cod) REFERENCES tbl_moveis(mov_cod)
);

CREATE TABLE tbl_entrega(
    ent_cod INTEGER AUTO_INCREMENT PRiMARY KEY,
    ent_data_prev DATE NOT NULL,
    ent_end VARCHAR (40) NOT NULL,
    rev_cod INTEGER,
    FOREIGN KEY(rev_cod) REFERENCES tbl_reserva(rev_cod)
);

CREATE TABLE tbl_montagem(
    mon_cod INTEGER AUTO_INCREMENT PRiMARY KEY,
    mon_data_prev DATE NOT NULL,
    ent_cod INTEGER,
    FOREIGN KEY(ent_cod) REFERENCES tbl_entrega(ent_cod)
);
-- Membuat database
create database fasion;
USE fasion;
drop database fasion;

-- Membuat tabel baju
CREATE TABLE IF NOT EXISTS baju (
    id_baju INT PRIMARY KEY,
    nama VARCHAR(100),
    ukuran VARCHAR(5),
    stok INT,
    harga INT
);

-- Membuat tabel celana
CREATE TABLE IF NOT EXISTS celana (
    id_celana INT PRIMARY KEY,
    nama_celana VARCHAR(100),
    ukuran_celana VARCHAR(5),
    stok_celana INT,
    harga_celana INT
);

-- Membuat tabel sepatu
CREATE TABLE IF NOT EXISTS sepatu (
    id_sepatu INT PRIMARY KEY,
    nama_sepatu VARCHAR(100),
    ukuran_sepatu VARCHAR(5),
    stok_sepatu INT,
    harga_sepatu INT
);

-- Mengisi data ke tabel baju
INSERT INTO baju (id_baju, nama, ukuran, stok, harga) VALUES
(2, 'aaa', 'M', 1, 1234567);

-- Mengisi data ke tabel celana
INSERT INTO celana (id_celana, nama_celana, ukuran_celana, stok_celana, harga_celana) VALUES
(2, 'ASa', 'S', 1, 1),
(3, 'AS', 'X', 122, 11111111);

-- Mengisi data ke tabel sepatu
INSERT INTO sepatu (id_sepatu, nama_sepatu, ukuran_sepatu, stok_sepatu, harga_sepatu) VALUES
(1, 'adaoiuyt', 'L', 123, 122),
(5, 'uyguyuy', 'S', 1, 1);

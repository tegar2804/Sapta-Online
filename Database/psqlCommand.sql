-- BIKIN DATABASE --
CREATE DATABASE proyek_basdat;

/*
Janlup Connect Ke Databasenya Dulu
\c proyek_basdat
*/

-- BIKIN TABLE CUSTOMER --
CREATE TABLE customer (
    nama_lengkap VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    JK CHAR NOT NULL,
    telp VARCHAR(20) NOT NULL,
    CONSTRAINT email_pk PRIMARY KEY(email)
);

-- BIKIN TABLE TOKO --
CREATE TABLE TOKO (
    id_toko VARCHAR(8) NOT NULL,
    nama_toko VARCHAR(255) NOT NULL,
    kategori VARCHAR(10) NOT NULL,
    waktu_buka TIME NOT NULL,
    waktu_tutup TIME NOT NULL,
    foto_toko VARCHAR(100) NOT NULL,
    CONSTRAINT id_toko_pk PRIMARY KEY(id_toko)
);

-- BIKIN TABLE MENU --
CREATE TABLE MENU (
    id_menu VARCHAR(8) NOT NULL,
    id_toko VARCHAR(8) NOT NULL,
    nama_menu VARCHAR(255) NOT NULL,
    harga_menu INT NOT NULL,
    foto_menu VARCHAR(100) NOT NULL,
    CONSTRAINT id_menu_pk PRIMARY KEY(id_menu),
    CONSTRAINT id_toko_fk FOREIGN KEY(id_toko) REFERENCES TOKO(id_toko)
);

-- BIKIN TABLE ORDER --
CREATE TABLE pesanan (
    id_order SERIAL NOT NULL,
    email VARCHAR(255) NOT NULL,
    tanggal_order DATE NOT NULL,
    harga_total INT NOT NULL,
    CONSTRAINT id_order_pk PRIMARY KEY(id_order),
    CONSTRAINT email_fk FOREIGN KEY(email) REFERENCES CUSTOMER(email),
    status_bayar BOOLEAN NOT NULL
);

-- INSERT DATA TOKO --
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T001', 'Warung Nasi Pecel', 'makanan', '08:00', '17:00', 'images/image\ 5.png');
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T002', 'Rumah Makan Padang', 'makanan', '08:00', '17:00', 'images/image\ 11.png');
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T003', 'Warung Bumbu Kacang', 'makanan', '08:00', '17:00', 'images/Resep-Gado-Gado\ \(1\).webp');
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T004', 'Mie Ayam Bakso Enak', 'makanan', '08:00', '17:00', 'images/Resep-Mie-Ayam-Ceker-Nikmat.jpg');
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T005', 'Juice Buah Segar Sapta', 'minuman', '08:00', '17:00', 'images/jus-cover.jpg');
INSERT INTO TOKO(id_toko, nama_toko, kategori, waktu_buka, waktu_tutup, foto_toko) VALUES('T006', 'Aneka Minuman Segar', 'minuman', '08:00', '17:00', 'images/minuman_kemasan_botol_image_2.jpg');

-- INSERT DATA MENU --
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M001','T001', 'Nasi Ayam', 12000, 'images/Pecel-Ayam-2.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M002','T001', 'Nasi Telur Dadar', 8000, 'images/image\ 5.png');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M003','T001', 'Nasi Lele', 10000, 'images/pecel\ lele.jpeg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M004','T002', 'Nasi Rendang', 16000, 'images/image\ 8.png');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M005','T002', 'Nasi Ayam Bakar', 20000, 'images/image\ 10.png');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M006','T002', 'Nasi Ayam Gulai', 20000, 'images/nasi\ ayam\ gulai.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M007','T002', 'Nasi Tongkol Balado', 15000, 'images/nasi\ tongkol\ balado.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M008','T002', 'Nasi Telur Balado', 10000, 'images/nasi\ telor\ balado.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M009','T003', 'Ketoprak', 12000, 'images/Resep-Ketoprak-Jakarta-Enak.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M010','T003', 'Gado-gado', 10000, 'images/Resep-Gado-Gado.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M011','T003', 'Doclang', 10000, 'images/doclang.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M012','T003', 'Siomay', 10000, 'images/Resep-Siomay-Bandung.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M013','T004', 'Mie Ayam Original', 12000, 'images/Resep-Mie-Ayam-Ceker-Nikmat.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M014','T004', 'Mie Ayam Ceker', 15000, 'images/mie\ ayam\ ceker.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M015','T004', 'Bakso Special', 12000, 'images/bakso\ bang.jpeg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M016','T004', 'Mie Ayam Bakso', 17000, 'images/mie\ ayam\ bakso.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M017','T005', 'Jus Alpukat', 12000, 'images/Jus-Alpukat.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M018','T005', 'Jus Mangga', 11000, 'images/Jus-Mangga.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M019','T005', 'Jus Melon', 11000, 'images/Jus\ Melon.jpe');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M020','T005', 'Jus Jeruk', 10000, 'images/Jus-Jeruk-Sederhana-1.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M021','T005', 'Jus Sirsak', 11000, 'images/Resep-Jus-Sirsak-scaled.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M022','T006', 'Air Mineral', 4000, 'images/air\ mineral.webp');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M023','T006', 'Es Teh', 4000, 'images/es\ teh.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M024','T006', 'Minuman Soda', 6000, 'images/minuman\ soda.jpg');
INSERT INTO MENU (id_menu, id_toko, nama_menu, harga_menu, foto_menu) VALUES ('M025','T006', 'Kopi', 5000, 'images/kopi\ good\ day.jpg');

-- BIKIN TABLE DETAIL_ORDER --
CREATE TABLE DETAIL_ORDER (
    id_order SERIAL NOT NULL,
    id_menu VARCHAR(8) NOT NULL,
    Qty INT NOT NULL,
    CONSTRAINT id_order_fk FOREIGN KEY(id_order) REFERENCES pesanan(id_order),
    CONSTRAINT id_menu_fk FOREIGN KEY(id_menu) REFERENCES MENU(id_menu)
);
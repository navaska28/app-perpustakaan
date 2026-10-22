# Dokumentasi REST API Perpustakaan

## 1. Informasi Umum

REST API ini digunakan untuk mengelola data buku, anggota, peminjaman, pengembalian buku, dan statistik pada aplikasi Perpustakaan Digital Kampus.

**Base URL:** `http://127.0.0.1:8000/api`

**Format respons:** JSON

**Header:**

- `Accept: application/json`
- Untuk request yang mengirim JSON, gunakan `Content-Type: application/json`.

## 2. Endpoint Buku

| Method | Endpoint               | Fungsi                              |
| ------ | ---------------------- | ----------------------------------- |
| GET    | `/books`               | Menampilkan daftar buku             |
| GET    | `/books?judul=letto`   | Mencari buku berdasarkan judul      |
| GET    | `/books?category_id=2` | Memfilter buku berdasarkan kategori |
| GET    | `/books/{id}`          | Menampilkan detail buku             |
| POST   | `/books`               | Menambahkan buku                    |
| PUT    | `/books/{id}`          | Memperbarui data buku               |
| DELETE | `/books/{id}`          | Menghapus buku                      |

### Contoh menambahkan buku

**Request Body:**

```json
{
  "judul": "Belajar Laravel API",
  "penulis": "Avas",
  "penerbit": "PENS",
  "tahun_terbit": 2025,
  "isbn": "9781234567890",
  "stok": 5,
  "category_id": 1
}
```

API memvalidasi data yang dikirim. Jika data wajib tidak diisi, API mengembalikan respons validasi error.

## 3. Endpoint Anggota

| Method | Endpoint        | Fungsi                     |
| ------ | --------------- | -------------------------- |
| GET    | `/members`      | Menampilkan daftar anggota |
| GET    | `/members/{id}` | Menampilkan detail anggota |

## 4. Endpoint Peminjaman

| Method | Endpoint                 | Fungsi                        |
| ------ | ------------------------ | ----------------------------- |
| GET    | `/loans`                 | Menampilkan daftar peminjaman |
| POST   | `/loans`                 | Membuat peminjaman baru       |
| PUT    | `/loans/{id}/kembalikan` | Memproses pengembalian buku   |

### Contoh membuat peminjaman

**Request Body:**

```json
{
  "member_id": 2,
  "user_id": 1,
  "tanggal_pinjam": "2026-10-22",
  "tanggal_kembali": "2026-10-29",
  "book_ids": [2]
}
```

Peminjaman baru memiliki status `dipinjam`. Ketika pengembalian diproses, status berubah menjadi `dikembalikan` dan tanggal pengembalian terisi.

## 5. Endpoint Statistik

| Method | Endpoint | Fungsi                             |
| ------ | -------- | ---------------------------------- |
| GET    | `/stats` | Menampilkan statistik perpustakaan |

Contoh respons:

```json
{
  "total_buku": 10,
  "total_anggota": 1,
  "total_peminjaman": 3,
  "peminjaman_aktif": 1
}
```

## 6. Contoh Respons Error

Jika buku dengan ID yang diminta tidak ditemukan, API dapat mengembalikan respons `404 Not Found`.

Jika data yang dikirim tidak memenuhi validasi, API dapat mengembalikan respons `422 Unprocessable Content` beserta detail kesalahan pada setiap field.

## 7. Pagination

Endpoint daftar buku, anggota, dan peminjaman menggunakan struktur pagination yang dapat memuat:

- `data`: data yang dikembalikan.
- `links`: tautan navigasi halaman.
- `meta`: informasi halaman, jumlah data, dan batas data per halaman.

## 8. Pengujian

Pengujian API dilakukan menggunakan Postman dengan header `Accept: application/json`. Pengujian meliputi pengambilan data, filter, penambahan, pembaruan, penghapusan, validasi, pengembalian buku, dan statistik perpustakaan.

/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - blogku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blogku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `blogku`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`nama_kategori`,`created_at`,`updated_at`) values 
(1,'Teknologi',NULL,NULL),
(2,'Bisnis',NULL,NULL),
(3,'Politik',NULL,NULL),
(4,'Kesehatan',NULL,NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(36,'2014_10_12_000000_create_users_table',1),
(37,'2014_10_12_100000_create_password_reset_tokens_table',1),
(38,'2014_10_12_100000_create_password_resets_table',1),
(39,'2019_08_19_000000_create_failed_jobs_table',1),
(40,'2019_12_14_000001_create_personal_access_tokens_table',1),
(41,'2023_02_20_072815_create_categories_table',1),
(42,'2023_02_20_073925_create_posts_table',1);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`judul`,`slug`,`deskripsi`,`author`,`tanggal`,`category_id`,`content`,`foto`,`user_id`,`created_at`,`updated_at`) values 
(1,'Belajar Vue JS pemula','belajar-vue-js-pemula','Vue.js adalah sebuah framework Javascript untuk membuat user interface dan single-page application (SPA).','Rifky Ramadhan','2023-02-23',1,'<p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Website menjadi bagian dari salah satu media yang kerap digunakan dalam berbagai bisnis di era digital. Untuk membuat&nbsp;<a href=\"https://blog.hacktiv8.com/mengenal-css-untuk-membuat-website-modern/\" style=\"color: rgb(12, 147, 228);\">web</a>&nbsp;dengan tampilan yang modern dibutuhkan bahasa pemrograman seperti HTML, CSS, dan JavaScript. Selain itu, dibutuhkan framework yang dapat membuat tampilan antarmuka atau User Interface (UI) seperti Angular, React, dan Vue.JS. Salah satu yang akan kita bahas di artikel ini adalah Vue JS karena penggunaannya yang sangat mudah. Berikut pengenalan Vue JS.</p><h2 id=\"apa-itu-vue-js\" style=\"margin-top: 1.8em; margin-bottom: 1.8em; line-height: 1.33; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;\">Apa Itu Vue JS?</h2><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Vue JS adalah framework JavaScript yang biasa digunakan developer untuk membuat UI dan single-page application (SPA). Vue JS lebih dikenal dengan Vue saja dan cara pengucapannya seperti membaca kata view (/vju:/).1. Framework yang diciptakan oleh developer Google, Evan You pada 2013 lalu ini dirancang dari dasar sekali agar dapat diimplementasikan secara bertahap. Intinya pustaka hanya difokuskan pada layar tampilan saja sehingga sangat mudah untuk diintegrasikan dengan pustaka atau projek yang lain. Selain itu, Vue juga mendukung SPA yang canggih saat dipadukan dengan&nbsp;<em>tools</em>&nbsp;modern dan dukungan pustaka. Kelebihan Vue JS adalah memiliki fitur utama lebih fokus pada rendering dan komposisi komponen, serta lebih ringan dibanding&nbsp;<a href=\"https://blog.hacktiv8.com/mengenal-framework-alpine-js-untuk-membuat-website-sederhana/\" style=\"color: rgb(12, 147, 228);\">framework</a>&nbsp;lainnya.</p><h2 id=\"vue-js-tutorial\" style=\"margin-top: 1.8em; margin-bottom: 1.8em; line-height: 1.33; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;\">Vue JS Tutorial</h2><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Ada beberapa&nbsp;<em>tools</em>&nbsp;yang harus kamu persiapkan untuk belajar Vue JS, di antaranya:</p><ol style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\"><li>Teks Editor</li><li>Nodejs dan NPM</li><li>Vue CLI</li><li>Web Browser</li></ol><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Bagi kamu yang baru pertama kali belajar, disarankan menggunakan teks editor atau web browser saja untuk bisa memahami konsep dasar Vue JS dulu. Setelah itu baru kamu bisa mencoba&nbsp;<em>tools</em>&nbsp;Nodejs dan Vue CLI untuk membuat aplikasi yang kompleks. Berikut contoh struktur dasar kode Vue JS.</p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\"><img src=\"https://blog.hacktiv8.com/content/images/2021/03/vue.png\" alt=\"\"></p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Kode Vuejs</p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Pada contoh di atas, kita menggunakan elemen</p><div style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">dengan id=”app”. Lalu kamu tinggal membuat objek app dari class Vue () dan menentukan elemen serta data yang akan ditampilkan.</div><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\"></p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Atribut el berfungsi untuk memilih elemen. Pada contoh di atas kita akan memilih elemen dengan id=”app”. Sedangkan atribut data berfungsi untuk menyimpan variabel yang berisi data. Data ini bisa juga kamu dapatkan dari server atau&nbsp;<em>local storage</em>.</p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Pada Vue JS, kita menggunakan tanda kurung {{…}} untuk menampilkan isi variabel. Perlu diketahui, Vue ini bersifat reaktif. Jadi jika isi variabel berubah, maka Vue akan melakukan render ulang.</p><p style=\"margin-top: 1.2em; margin-bottom: 1.2em; color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 16px;\">Untuk kamu yang ingin mempelajari Vue JS lebih lanjut, kamu bisa mengikuti tutorialnya dari video Hacktiv8&nbsp;<a href=\"https://blog.hacktiv8.com/cara-membuat-website-statis-dan-dinamis/\" style=\"color: rgb(12, 147, 228);\">Technical Workshop</a>&nbsp;yang dimentori oleh Instruktur Hacktiv8, Semmi Verian Putera. Di workshop ini kamu dapat praktik langsung membuat website modern dengan Vue JS hanya dalam 1 jam. Kamu juga akan mendapat penjelasan cara menggunakan Vue JS secara lengkap. Yuk, buat website modern versi kamu dengan melihat video ini sampai akhir. Selamat mencoba!</p>','20230223014348.png',1,'2023-02-23 01:43:48','2023-02-23 02:24:52'),
(2,'Puan Maharani Akan Lakukan Kunjungan, PAN: Acara Santai Saja','puan-maharani-akan-lakukan-kunjungan-pan-acara-santai-saja','Manuver dan kunjungan politik dilakukan sejumlah elite politik menjelang Pemilu 2024. Mengenai hal ini, PAN siap menyambut Ketua DPP PDIP Puan Maharani yang bakal melanjutkan safari politik pada Maret 2023.','Rifky Ramadhan','2023-02-23',3,'<div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><p style=\"margin-bottom: 1.2em;\">Warta Ekonomi, Jakarta -</p></div><div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><p style=\"margin-top: 1.2em; margin-bottom: 1.2em;\">Manuver dan kunjungan politik dilakukan sejumlah elite politik menjelang&nbsp;<a href=\"https://wartaekonomi.co.id/tag-34161/pemilu-2024\" style=\"color: rgb(12, 147, 228);\">Pemilu 2024</a>. Mengenai hal ini, PAN siap menyambut Ketua DPP PDIP Puan Maharani yang bakal melanjutkan safari politik pada Maret 2023. Ketua Umum PAN Zulkifli Hasan (Zulhas) bakal bicara soal situasi politik aktual dalam suasana informal dengan Puan.</p></div><div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><p style=\"margin-top: 1.2em; margin-bottom: 1.2em;\">Waketum PAN Viva Yoga Mauladi menyatakan pihaknya sudah berkomunikasi dengan PDIP terkait rencana safari politik Puan. Namun dia belum bisa memastikan kapan pertemuan bakal digelar.</p></div><div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><p style=\"margin-top: 1.2em; margin-bottom: 1.2em;\">“Sudah ada (komunikasi), acaranya santai saja. Soal tempat, nanti diinformasikan,” kata Viva di Jakarta, Selasa (21/2/2023).</p></div><div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><p style=\"margin-top: 1.2em; margin-bottom: 1.2em;\">Rencana Puan bakal melanjutkan safari politik disampaikan Ketua DPP PDIP Said Abdullah, dan Ketua Bappilu DPP PDIP Bambang Wuryanto alias Bambang Pacul. Viva mengakui pertemuan Zulhas-Puan nantinya turut menyinggung situasi politik.</p></div>','20230223024841.jpeg',1,'2023-02-23 02:48:41','2023-02-23 02:48:41'),
(4,'Cuci Mobil 24 Jam Kurang Diminati, Warganet: “Mending Cuci Sendiri, Setengah Jam Udah Kelar”','cuci-mobil-24-jam-kurang-diminati-warganet-mending-cuci-sendiri-setengah-jam-udah-kelar','Sepi dari pembeli karena banyak yang mengeluh harus bayar setelah makan, padahal menurut pembeli itu merupakan restoran ibu kandung masa harus bayar.','Andre haxor','2023-02-23',2,'<div class=\"cl-preview-section\" style=\"color: rgba(0, 0, 0, 0.75); font-family: Lato, &quot;Helvetica Neue&quot;, Helvetica, sans-serif; font-size: 18px; background-color: rgb(243, 243, 243);\"><h1 id=\"cuci-mobil-24-jam-kurang-diminati-warganet-“mending-cuci-sendiri-setengah-jam-udah-kelar”\" style=\"font-size: 2em; margin-bottom: 1.8em; line-height: 1.33;\"><p style=\"overflow-wrap: break-word; max-width: 100%; margin-bottom: 1.5em; line-height: 1.7em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-family: &quot;Times New Roman&quot;;\">So Lee Hin (29), pemuda asal Desa Go Yang Dong ini hijrah dari negeri asalnya Korea ke Indonesia demi mencari sesuap nasi. Pada Awal karirnya, ia membuka restoran padang bundo kanduang, namun sepi dari pembeli karena banyak yang mengeluh harus bayar setelah makan, padahal menurut pembeli itu merupakan restoran ibu kandung masa harus bayar.</span></p><div class=\"wp-block-image\" style=\"overflow-wrap: break-word; max-width: 100%; margin: 0px 0px 1em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal; background-color: rgb(255, 255, 255);\"><figure class=\"aligncenter size-large is-resized\" style=\"overflow-wrap: break-word; max-width: 100%; clear: both; display: table; margin-right: auto; margin-bottom: 0px; margin-left: auto; text-align: center; height: auto;\"><img src=\"https://kopetnews.id/wp-content/uploads/2022/01/image-4-650x352.png\" alt=\"\" class=\"wp-image-839\" width=\"650\" height=\"352\" srcset=\"https://kopetnews.id/wp-content/uploads/2022/01/image-4-650x352.png 650w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-400x216.png 400w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-250x135.png 250w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-768x416.png 768w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-150x81.png 150w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-50x27.png 50w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-100x54.png 100w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-200x108.png 200w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-300x162.png 300w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-350x189.png 350w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-450x244.png 450w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-500x271.png 500w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-550x298.png 550w, https://kopetnews.id/wp-content/uploads/2022/01/image-4-800x433.png 800w, https://kopetnews.id/wp-content/uploads/2022/01/image-4.png 959w\" sizes=\"(max-width: 650px) 100vw, 650px\" style=\"overflow-wrap: break-word; height: auto; vertical-align: bottom; border-radius: inherit;\"><figcaption style=\"overflow-wrap: break-word; max-width: 100%; margin-top: 0.5em; margin-bottom: 1em; display: table-caption; caption-side: bottom;\"><strong style=\"overflow-wrap: break-word; max-width: 100%;\"><em style=\"overflow-wrap: break-word; max-width: 100%;\">Cuci Mobil 24 Jam Sepi pengunjung</em></strong></figcaption></figure></div><p style=\"overflow-wrap: break-word; max-width: 100%; margin-bottom: 1.5em; line-height: 1.7em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Tak putus asa, akhirnya So Lee Hin mencoba bisnis jualan buah pare, namun di minggu pertama harus gulung tikar karena banyak pembeli mengeluh buah pare yang dijual pahit semua. Dengan modal uang terakhirnya, So Lee Hin mencoba peruntungan lain dengan membuka tempat cuci mobil 24 jam.</span><br style=\"overflow-wrap: break-word; max-width: 100%;\"><br style=\"overflow-wrap: break-word; max-width: 100%;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Pada hari pertama grand opening hanya ada 2 kendaraan saja yang mau cuci di tempatnya. Alasan warga yang enggan mencuci mobil di tempat So Lee Hin adalah waktu mencucinya yang lama, pemilik mobil harus rela menginap karena proses pencucian mobil bisa 24 jam. Dengan kenyataan hidup tersebut, So Lee Hin harus menerimanya dan kembali ke negara asal, Ia pun berniat untuk menjual seblak kuah tongseng sesampainya di kampung halaman.</span></p></h1></div>','20230223071700.png',3,'2023-02-23 07:17:00','2023-02-23 07:19:10'),
(5,'Pandemi Tak Kunjung Usai Perusahaan Toyota Rela Menjual Mobil Demi Menggaji Pegawainya','pandemi-tak-kunjung-usai-perusahaan-toyota-rela-menjual-mobil-demi-menggaji-pegawainya','Pandemi yang melanda sejak awal tahun 2020 membuat pemerintah harus menerapkan pembatasan sosial yang berdampak buruk pada kepentingan bisnis.','Andre haxor','2023-02-23',2,'<p style=\"overflow-wrap: break-word; max-width: 100%; margin-bottom: 1.5em; line-height: 1.7em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Pandemi yang melanda sejak awal tahun 2020 membuat pemerintah harus menerapkan pembatasan sosial yang berdampak buruk pada kepentingan bisnis.</span><br style=\"overflow-wrap: break-word; max-width: 100%;\"><br style=\"overflow-wrap: break-word; max-width: 100%;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Salah satu industri yang terkena dampaknya adalah Toyota. Disaat perusahaan lain melakukan PHK kepada sejumlah pegawainya untuk menekan biaya pengeluaran, berbeda dengan Presiden Direktur Toyota yang memerintahkan Manager masing-masing cabangnya untuk segera menjual seluruh mobil demi menggaji para pegawainya.</span></p><div class=\"wp-block-image\" style=\"overflow-wrap: break-word; max-width: 100%; margin: 0px 0px 1em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal;\"><figure class=\"aligncenter size-large\" style=\"overflow-wrap: break-word; max-width: 100%; clear: both; display: table; margin-right: auto; margin-bottom: 0px; margin-left: auto; text-align: center; height: auto;\"><img width=\"650\" height=\"488\" src=\"https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-650x488.jpg\" alt=\"\" class=\"wp-image-819\" srcset=\"https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-650x488.jpg 650w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-400x300.jpg 400w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-250x188.jpg 250w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-768x576.jpg 768w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-150x113.jpg 150w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-50x38.jpg 50w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-100x75.jpg 100w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-200x150.jpg 200w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-300x225.jpg 300w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-350x263.jpg 350w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-450x338.jpg 450w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-500x375.jpg 500w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil-550x413.jpg 550w, https://kopetnews.id/wp-content/uploads/2022/01/toyota-jual-mobil.jpg 800w\" sizes=\"(max-width: 650px) 100vw, 650px\" style=\"overflow-wrap: break-word; height: auto; vertical-align: bottom; border-radius: inherit;\"><figcaption style=\"overflow-wrap: break-word; max-width: 100%; margin-top: 0.5em; margin-bottom: 1em; display: table-caption; caption-side: bottom;\"><strong style=\"overflow-wrap: break-word; max-width: 100%;\"><em style=\"overflow-wrap: break-word; max-width: 100%;\">Salah satu cabang Toyota yang rela menjual mobil</em></strong></figcaption></figure></div><p style=\"overflow-wrap: break-word; max-width: 100%; margin-bottom: 1.5em; line-height: 1.7em; color: rgb(0, 0, 0); font-family: Arial, sans-serif; font-size: 16px; font-variant-ligatures: normal;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Akibat aksi heroik tersebut, Presdir Toyota menerima banyak pujian dari para Presdir perusahaan otomotif lainnya. Ide tersebut pun diikuti oleh Perusahaan Suzuki dan Kawasaki yang rela menjual motor demi menggaji pegawainya juga.</span></p>','20230223073009.png',3,'2023-02-23 07:30:09','2023-02-23 07:30:09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`user_type`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Rifky Ramadhan','filmstorage55@gmail.com',NULL,'$2y$10$zAX0oNoy1DplzsL4J.E2ku8InqCkdq0GfqSbxznc6Rtzc6xRggRyC',0,NULL,'2023-02-23 01:12:39','2023-02-23 01:12:39'),
(2,'Colton Blevins','bypaza@mailinator.com',NULL,'$2y$10$Aj4/6FT6k2f7q0SWUpEPzuTzK.MfVruJp6iyONyPkxYMZH3I2w5Si',0,NULL,'2023-02-23 04:23:08','2023-02-23 04:23:08'),
(3,'Andre haxor','admin@gmail.com',NULL,'$2y$10$.W/WQEyA91jf0vUVh1qjzeZZvapOODXJxIbgVeSjIpkfFQL5HCThG',1,NULL,'2023-02-23 07:11:14','2023-02-23 07:11:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

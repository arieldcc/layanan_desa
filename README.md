Laravel 10

Upload Gambar:
composer require intervention/image

Autentikasi Login/Register
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
npm run build  


Pelayanan desa:
Pass: admin123

Ubah route pada RouteServiceProvider.php

Membuat tabel baru artisan laravel : php artisan make:migration create_m_syarat_table

Membuat data awal : php artisan make:seeder dataAwal
Menjalankan data seeder : php artisan db:seed --class=dataAwal

Jika larval tidak berjalan dengan normal ketika ada perubahan route: php artisan optimize

Menampilkan kode kustom validation : php artisan lang:publish

Menjalankan laravel dijaringan : php artisan serve --host 0.0.0.0

Upload project ke GitHub:
git init
git add README.md
git add .
git commit -m "first commit"
git remote add origin https://github.com/userName/repoName.git
git push --force origin master

Jika terjadi error coba gunakan:
git fetch origin master:tmp
git rebase tmp
git push origin HEAD:master
git branch -D tmp

Referensi: https://stackoverflow.com/questions/28429819/rejected-master-master-fetch-first

Cara clone/mengambil project dari GitHub:
1. git clone url_project di GitHub (ambil project dari GitHub)
2. Composer update (update dependence yang dibutuhkan)
3. Php artisan key:generate (membuat key ke file .env)
4. Php artisan migrate (membuat/memasukkan tabel)
5. Php artisan db:seed —class=nama_class_seeder (input data awal) 
Laravel 10

Upload Gambar:
composer require intervention/image

Autentikasi Login/Register
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
npm run build  


Pelayanan desa:
Pass: admin123

Ubah route pada RouteServiceProvider.php

Membuat tabel baru artisan laravel : php artisan make:migration create_m_syarat_table

Membuat data awal : php artisan make:seeder dataAwal
Menjalankan data seeder : php artisan db:seed --class=dataAwal

Jika larval tidak berjalan dengan normal ketika ada perubahan route: php artisan optimize

Menampilkan kode kustom validation : php artisan lang:publish

Menjalankan laravel dijaringan : php artisan serve --host 0.0.0.0

Upload project ke GitHub:
git init
git add README.md
git add .
git commit -m "first commit"
git remote add origin https://github.com/userName/repoName.git
git push --force origin master

Jika terjadi error coba gunakan:
git fetch origin master:tmp
git rebase tmp
git push origin HEAD:master
git branch -D tmp

Referensi: https://stackoverflow.com/questions/28429819/rejected-master-master-fetch-first

Cara clone/mengambil project dari GitHub:
1. git clone url_project di GitHub (ambil project dari GitHub)
2. Composer update (update dependence yang dibutuhkan)
3. Php artisan key:generate (membuat key ke file .env)
4. Php artisan migrate (membuat/memasukkan tabel)
5. Php artisan db:seed —class=nama_class_seeder (input data awal) 

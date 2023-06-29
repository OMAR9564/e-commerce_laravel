# E-Commerce Laravel Projesi

Bu repo, bir e-ticaret projesini Laravel frameworkü kullanarak geliştirmektedir. Proje, kullanıcıların ürünleri incelemesine, satın almalarına ve yöneticilerin ürünleri eklemesine, düzenlemesine ve siparişleri yönetmesine olanak tanır.

## Özellikler
Laravel + HTML + CSS + JavaScript + BootStrap +Mysql

- Kullanıcılar için:
  - Ürünleri görüntüleme
  - Ürünleri filtreleme ve arama yapma
  - Ürün detaylarını görüntüleme
  - Ürünleri sepete ekleme ve çıkarma
  - Sipariş oluşturma ve takip etme
  - Kullanıcı hesabı oluşturma ve yönetme
- Yöneticiler için:
  - Ürün ekleme, düzenleme ve silme
  - Kategori ve marka yönetimi
  - Siparişleri görüntüleme ve yönetme
- Admin paneli:
  - Yönetici kullanıcılarını yönetme
  - İstatistikleri görüntüleme

## Kurulum

1. Bu projeyi bilgisayarınıza indirin:

```
git clone https://github.com/OMAR9564/e-commerce_laravel.git
```

2. Proje dizinine gidin:

```
cd e-commerce_laravel
```

3. Gerekli bağımlılıkları yükleyin:
   
```
composer install
```
4. .env dosyasını oluşturun ve veritabanı bilgilerinizi ayarlayın:
   
```
cp .env.example .env
```

5. Uygulama anahtarını oluşturun:

```
php artisan key:generate
```

6. Veritabanını oluşturun ve tabloları yukleyin edin:

```
php artisan migrate
```

7. Varsayılan verileri ekleyin:

```
php artisan db:seed
```

8. Uygulamayı başlatın:

```
php artisan serve
```
Uygulama, http://localhost:8000 adresinde çalışacaktır.

## Kullanım

Uygulama başlatıldığında, ana sayfa görüntülenecektir. Kullanıcılar, ürünleri inceleyebilir, arama yapabilir, sepete ürün ekleyebilir ve sipariş oluşturabilirler. Yöneticiler, yönetici paneline giriş yaparak ürünleri yönetebilir, siparişleri görüntüleyebilir ve istatistikleri kontrol edebilir.

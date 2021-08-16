# Veri Tabanı 
Symfony'de bazı(Coğu da olabilir. Emin değilim :smile) yapılandırmalar `.env` dosyasından yapılmaktadır. 

`.env` dosyasına `DATABASE_URL` değişkeninden ayarlanıyor.

[`veri tabanı sunucusu`]://[`veritabanı kullanıcısı`]:[`parola`]@[`sunucu adresi`]:[`veri tabanı port`]/[`veri tabani adi`]?serverVersion=[`veritabanı sunucusu sürümü`]

> DATABASE_URL="postgresql://ahmet:1234@127.0.0.1:5432/blog?serverVersion=13&charset=utf8"

Veritabanı bağlantısını bu şekilde yapıyoruz. Gereken bilgileri girdikten sonra kaydedin.

**!NOT**: Veritabanı adını boş bırakmayın, eğer veritabanı mevcut değilse, bu komut ile oluşturabilirsiniz:
```shell
    php bin/console doctrine:database:create
```

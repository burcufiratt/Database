-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Kas 2020, 09:02:26
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `demo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresblacklist`
--

CREATE TABLE `adresblacklist` (
  `ID` int(20) NOT NULL,
  `HostName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `MailAdresi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(10) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adresblacklist`
--

INSERT INTO `adresblacklist` (`ID`, `HostName`, `MailAdresi`, `EklenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(2, 'LAPTOP-53d56', 'asdc@hotmail.com', '2020-11-24 11:51:40', 'BurcuFırat', 'deneme', b'0000000000', 0),
(3, 'LAPTOP-53d5FS', 'asdc11@hotmail.com', '2020-11-24 11:51:47', 'BurcuFırat', 'deneme', b'0000000000', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adreswhitelist`
--

CREATE TABLE `adreswhitelist` (
  `ID` int(20) NOT NULL,
  `HostName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `MailAdresi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(1) NOT NULL,
  `Silen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `adreswhitelist`
--

INSERT INTO `adreswhitelist` (`ID`, `HostName`, `MailAdresi`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(1, 'LAPTOP-53d5FS', 'asdc11@hotmail.com', '2020-11-19 09:23:28', '2020-11-19 09:23:28', '2', '0', b'0', 0),
(5, 'LAPTOP0', 'asdc11@hotmail.com', '2020-11-19 09:25:03', '2020-11-19 09:25:03', '2', 'BurcuFırat', b'0', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `badwords`
--

CREATE TABLE `badwords` (
  `ID` int(11) NOT NULL,
  `Kelime` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `badwords`
--

INSERT INTO `badwords` (`ID`, `Kelime`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(1, 'bad', '2020-11-25 07:01:04', '2020-11-13 10:23:12', '2', 'deneme', b'00', 0),
(6, 'burcu', '2020-11-24 14:54:39', '2020-11-24 14:54:39', 'BurcuFırat', '', b'00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blacklist`
--

CREATE TABLE `blacklist` (
  `ID` int(11) NOT NULL,
  `HostName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `IPTuru` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `IPAdresi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `KurumID` int(50) NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `blacklist`
--

INSERT INTO `blacklist` (`ID`, `HostName`, `IPTuru`, `IPAdresi`, `KurumID`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(1, 'LAPTOP-53d56', 'Blok', '234324', 32, '2020-11-13 10:34:11', '2020-11-13 10:34:11', '2', '2', b'00', 0),
(2, 'LAPTOP-53d55', 'Blok', '1907', 30, '2020-11-17 06:38:41', '2020-11-17 06:38:41', '2', 'BurcuFırat', b'00', 0),
(4, 'LAPTOP', 'Tekil', '234325', 33, '2020-11-24 14:50:32', '2020-11-24 14:50:32', 'BurcuFırat', '', b'00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `domainextension`
--

CREATE TABLE `domainextension` (
  `ID` int(20) NOT NULL,
  `Kelime` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `domainextension`
--

INSERT INTO `domainextension` (`ID`, `Kelime`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(2, 'bad', '2020-11-13 10:38:13', '2020-11-13 10:38:13', '2', '2', b'00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `ID` int(20) NOT NULL,
  `AdSoyad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `MailAdresi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `Sifre` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `kod` text COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`ID`, `AdSoyad`, `MailAdresi`, `Sifre`, `kod`) VALUES
(6, 'BurcuFırat', 'buurcufrt@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '6572_6762'),
(7, 'deneme', 'burcufirat123@gmail.com', '77369e37b2aa1404f416275183ab055f', '5722_7645');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurumlar`
--

CREATE TABLE `kurumlar` (
  `KID` int(50) NOT NULL,
  `KurumAdi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `Domain` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL,
  `KTID` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kurumlar`
--

INSERT INTO `kurumlar` (`KID`, `KurumAdi`, `Domain`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`, `KTID`) VALUES
(1, 'sabahweb', 'sabahweb.com', '2020-11-24 15:17:34', '2020-11-24 15:17:34', 'BurcuFırat', '', b'00', 0, '5'),
(2, 'burcu', '11.com', '2020-11-24 15:17:57', '2020-11-24 15:17:57', 'BurcuFırat', 'BurcuFırat', b'00', 0, '4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kurumtürleri`
--

CREATE TABLE `kurumtürleri` (
  `ID` int(20) NOT NULL,
  `Adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kurumtürleri`
--

INSERT INTO `kurumtürleri` (`ID`, `Adi`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(1, 'Devlet Kurumları', '2020-11-13 10:51:36', '2020-11-13 10:51:36', '2', '2', b'00', 0),
(2, 'Telekominikasyon Sirketleri', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '2', b'00', 0),
(3, 'E-Ticaret Portallari', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', b'00', 0),
(4, 'Global Dosya Gonderim Portallari', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', b'00', 0),
(5, 'Ozel Sirketler', '2020-11-17 10:05:47', '2020-11-17 10:05:47', '2', '0', b'00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE `log` (
  `ID` int(20) NOT NULL,
  `kullanici` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `tablo` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `islem` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `log`
--

INSERT INTO `log` (`ID`, `kullanici`, `tablo`, `islem`, `tarih`) VALUES
(379, 'deneme', '/mailsistemi/kurumlarduzenle.php?id=2', '', '2020-11-24 15:18:25'),
(380, 'deneme', '/mailsistemi/adresblacklistduzenle.php?id=3', '', '2020-11-24 17:55:15'),
(381, 'BurcuFırat', '/mailsistemi/kurumlarduzenle.php?id=2', '', '2020-11-24 17:58:58'),
(382, 'BurcuFırat', '/mailsistemi/adreswhitelistduzenle.php?islem=sil&id=8', '', '2020-11-24 18:02:22'),
(383, 'BurcuFırat', '/mailsistemi/kullaniciduzenle.php?id=7', '', '2020-11-25 06:56:53'),
(384, 'BurcuFırat', '/mailsistemi/kullaniciduzenle.php?id=7', '', '2020-11-25 06:57:15'),
(385, 'deneme', '/mailsistemi/badwordsduzenle.php?id=1', '', '2020-11-25 07:01:04'),
(386, 'deneme', '/mailsistemi/kurumlarduzenle.php?islem=ekle', '', '2020-11-25 07:53:33'),
(387, 'deneme', '/mailsistemi/kurumlarduzenle.php?id=3', '', '2020-11-25 07:53:39'),
(388, 'deneme', '/mailsistemi/kurumlarduzenle.php?islem=sil&id=3', '', '2020-11-25 07:53:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `whitelist`
--

CREATE TABLE `whitelist` (
  `ID` int(11) NOT NULL,
  `HostName` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `IPTuru` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `IPAdresi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `KurumID` int(50) NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `whitelist`
--

INSERT INTO `whitelist` (`ID`, `HostName`, `IPTuru`, `IPAdresi`, `KurumID`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(3, 'LAPTOP-53d5F', 'Blok', '234324', 32, '2020-11-24 13:21:38', '2020-11-24 13:21:38', 'deneme', 'BurcuFırat', b'00', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yersaglayicilari`
--

CREATE TABLE `yersaglayicilari` (
  `ID` int(20) NOT NULL,
  `YerSaglayiciAdi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `EklenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `DuzenlenmeTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `Ekleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Duzenleyen` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `Silindi` bit(2) NOT NULL,
  `Silen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yersaglayicilari`
--

INSERT INTO `yersaglayicilari` (`ID`, `YerSaglayiciAdi`, `EklenmeTarihi`, `DuzenlenmeTarihi`, `Ekleyen`, `Duzenleyen`, `Silindi`, `Silen`) VALUES
(5, 'ddafas', '2020-11-24 13:23:50', '2020-11-24 13:23:50', 'BurcuFırat', 'BurcuFırat', b'00', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresblacklist`
--
ALTER TABLE `adresblacklist`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `adreswhitelist`
--
ALTER TABLE `adreswhitelist`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `badwords`
--
ALTER TABLE `badwords`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `domainextension`
--
ALTER TABLE `domainextension`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Tablo için indeksler `kurumlar`
--
ALTER TABLE `kurumlar`
  ADD PRIMARY KEY (`KID`);

--
-- Tablo için indeksler `kurumtürleri`
--
ALTER TABLE `kurumtürleri`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `whitelist`
--
ALTER TABLE `whitelist`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `yersaglayicilari`
--
ALTER TABLE `yersaglayicilari`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresblacklist`
--
ALTER TABLE `adresblacklist`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `adreswhitelist`
--
ALTER TABLE `adreswhitelist`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `badwords`
--
ALTER TABLE `badwords`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `domainextension`
--
ALTER TABLE `domainextension`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kurumlar`
--
ALTER TABLE `kurumlar`
  MODIFY `KID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kurumtürleri`
--
ALTER TABLE `kurumtürleri`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=389;

--
-- Tablo için AUTO_INCREMENT değeri `whitelist`
--
ALTER TABLE `whitelist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `yersaglayicilari`
--
ALTER TABLE `yersaglayicilari`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

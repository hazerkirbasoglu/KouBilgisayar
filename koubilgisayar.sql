-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Kas 2016, 11:07:59
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `koubilgisayar`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adminler`
--

CREATE TABLE `adminler` (
  `ID` int(32) NOT NULL,
  `Unvan` varchar(256) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `KullaniciAdi` varchar(256) DEFAULT NULL,
  `Sifre` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `adminler`
--

INSERT INTO `adminler` (`ID`, `Unvan`, `KullaniciAdi`, `Sifre`) VALUES
(1, 'Prof.Dr.Ahmet Mehmet', 'ahmet', '123123'),
(2, 'Arş. Gör. Mahmut Tuncer', 'mahmut', '123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `ID` int(32) NOT NULL,
  `Tarih` date DEFAULT NULL,
  `AdminID` int(32) DEFAULT NULL,
  `DuyuruBaslik` varchar(256) DEFAULT NULL,
  `DuyuruIcerikHtml` varchar(4096) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`ID`, `Tarih`, `AdminID`, `DuyuruBaslik`, `DuyuruIcerikHtml`) VALUES
(3, '2016-11-03', 1, 'milletttt', 'ne yapiyorsunuzzzz ???????????????'),
(5, '2016-11-04', 2, 'added by mamuuuud', 'oo yeeee');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

CREATE TABLE `haberler` (
  `ID` int(32) NOT NULL,
  `Tarih` date DEFAULT NULL,
  `AdminID` int(32) DEFAULT NULL,
  `HaberBaslik` varchar(256) DEFAULT NULL,
  `HaberIcerikHtml` varchar(4096) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`ID`, `Tarih`, `AdminID`, `HaberBaslik`, `HaberIcerikHtml`) VALUES
(1, '2016-11-03', 1, 'sdfsdgxxxx', 'sdfdzsfsyyyy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slaytlar`
--

CREATE TABLE `slaytlar` (
  `ID` int(32) NOT NULL,
  `SlaytBaslik` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `slaytlar`
--

INSERT INTO `slaytlar` (`ID`, `SlaytBaslik`) VALUES
(1, 'bASDASDASD'),
(5, 'RTYTUTYUTYUTYU'),
(7, 'bbbbbbbb'),
(8, 'asdasfasdasd');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminler`
--
ALTER TABLE `adminler`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `haberler`
--
ALTER TABLE `haberler`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `slaytlar`
--
ALTER TABLE `slaytlar`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adminler`
--
ALTER TABLE `adminler`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `haberler`
--
ALTER TABLE `haberler`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `slaytlar`
--
ALTER TABLE `slaytlar`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

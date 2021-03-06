<!-- omit in toc -->
# ショッピングサイト・ビルド手順書 
 
 <a id="sec1"></a>

## 1. ドキュメント作成者

-  越智陸仁

<a id="sec2"></a>

## 2. 改訂履歴

- 1.0:
  - 作成日時: 2022-02-1
  - 更新内容: 初版作成

<a id="sec3"></a>

## 3. このドキュメントの目次

- [1. ドキュメント作成者](#1-ドキュメント作成者)
- [2. 改訂履歴](#2-改訂履歴)
- [3. このドキュメントの目次](#3-このドキュメントの目次)
- [4. このドキュメントの目的・概要](#4-このドキュメントの目的概要)
- [5. 前提条件](#5-前提条件)
- [6. 作業端末](#6-作業端末)
- [7. 手順書](#7-手順書)
  - [7.1. データベースの準備](#71-データベースの準備)
  - [7.2. データベースのテスト](#72-データベースのテスト)

<a id="sec4"></a>

## 4. このドキュメントの目的・概要

- インターネットショッピングサイトを模して作成した、データベースおよびHTML,php,cssを学ぶために作成した成果物を説明するもの。
- 成果物を実行するための手順を記載したもの。

<a id="sec5"></a>

## 5. 前提条件

- 作業用端末に、XAMPP等の実行環境がインストール済みであること。
- 作業用端末においてPHPが実行できる環境がインストール済みであること。

<a id="sec6"></a>

## 6. 作業端末

自端末(OS:Windows10)

<a id="sec7"></a>

## 7. 手順書

### 7.1. データベースの準備

- XAMPPを起動し、`phpMyAdmin`へアクセスする。
- `shop01008\data\mysql_shop.txt` の内容をコピーし、SQLタブにペーストする。
- SQL文を実行する。

### 7.2. データベースのテスト

- インターネットブラウザを開き、[データベーステストファイル](http://localhost/shop01008/data/dbconfirm.php)へアクセスする。
- 表示されている情報が下記のものと同一であるか確認する。

 ```
  ident=1, name=NEC LAVIE
  ident=2, name=dynabook AZ45
  ident=3, name=Surface Pro
  ident=4, name=FMV LIFEBOOK
  ident=5, name=MacBook Pro
  ident=6, name=確かな力が身につくPHP「超」入門
  ident=7, name=スラスラわかるJavaScript
  ident=8, name=SCRUM BOOT CAMP THE BOOK
  ident=9, name=かんたんUML入門 (プログラミングの教科書)
  ident=10, name=Webデザイナーのための jQuery入門
  ident=11, name=÷(ディバイド)
  ident=12, name=Live in San Diego [12 inch Analog]
  ident=13, name=25(UK盤)
  ident=14, name=Somehow,Someday,Somewhere
  ident=15, name=Singles[Explicit]
  ```
- 上記のものと同じか確認できれば成功。
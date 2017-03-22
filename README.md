# Kinoue/Amidakuji

## フォルダ構成

```
amidakuji/
├── src/               ... amidakuiのソースコード
├── tests/             ... amidakuiのテストコード
├── vendor/            ... Composerのvendorフォルダ
├── bin/               ... Shellスクリプトを配置
├── docs/              ... ドキュメントを配置
├── composer.json      ... Composer設定ファイル
├── composer.lock      ... Composerロックファイル
└── sami_config.php    ... sami(APIドキュメント作成ツール)の設定ファイル
```

## 実行環境

### 必要なソフトウェア

* Composer
* Docker for Mac

### 動作確認済環境

| Host OS          | Composer | Docker for Mac |
| :--------------- | :------- | :------------- |
| Mac OS X 10.12.1 |  1.4.1   | 1.13.1         |

### 環境構成

* PHP 7.0.16

### 実行方法

```shell
$ cd amidakuji
$ ./bin/docker-run.sh
縦線の長さ、縦線の本数、横線の本数を半角スペース区切りで入力してください。
6 4 3
横線の開始点(X軸)、横線の開始点(Y軸)、横線の終了点(Y軸)を半角スペース区切りで入力してください。
(exitでプログラム中断)
1 3 5
2 4 2
3 1 2
4
```

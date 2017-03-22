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
```

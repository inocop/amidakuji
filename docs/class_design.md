# Kinoue/Amidakuji

## クラス一覧

```
src/
├── Exception/
├── Model/
│	├── CustomObject/
│	│	└── HorizontalLineObject.php
│	├── Validation/
│	│	├── BaseValidation.php
│	│	└── LineValidation.php
│	├── AmidakujiConst.php				... あみだくじ全体で使用する定数
│	└── LineBundler.php					... あみだくじの縦線、横線を管理するクラス
├── Amidakuji.php						... あみだくじの入力、正解ルート計算処理のルーティング
└── index.php							... Amidakujiの実行スクリプト
```


## クラス解説

以下のように１ラインでの依存関係にあります。

Amidakuji -> LineBundler -> LineValidation

BaseValidationに汎用的な検証処理を持たせ、
BaseValidationを継承したLineValidationに仕様に依存する検証処理を行う


## APIドキュメント

* [docs/api/index.html](docs/api/index.html) 参照。
# Kinoue/Amidakuji

## クラス設計

```
src/
├── Exception/
├── Model/
	├── CustomObject/
		└── HorizontalLineObject.php
	├── Validation/
		├── BaseValidation.php
		└── LineValidation.php
	├── AmidakujiConst.php				... あみだくじ全体で使用する定数
	└── LineBundler.php					... あみだくじの縦線、横線を管理するクラス
├── Amidakuji.php						... あみだくじの入力、正解ルート計算処理のルーティング
└── index.php							... Amidakujiの実行スクリプト
```



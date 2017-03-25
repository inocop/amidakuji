## クラス図作成ツール

[PlantText](https://www.planttext.com/)

上記URLに以下を貼り付けて生成

```
@startuml

title Amidakuji - Class Diagram

class Amidakuji {
  +LineBundler $lineBundler
  +void __construct(LineBundler $lineBundler)
  +void start()
}

class LineBundler {
  -LineValidation $lineValidation
  -HorizontalLineObejct[] $hLineList
  +void __construct(LineValidation $lineValidation)
}

Amidakuji .down.> LineBundler: 依存
LineBundler .down.> LineValidation: 依存
LineBundler "1" o-right- "n" HorizontalLineObejct:集約

LineValidation -right-|> BaseValidation:継承

class AmidakujiConst

note right of [AmidakujiConst]
    全体で使用する定数
end note

@enduml
```


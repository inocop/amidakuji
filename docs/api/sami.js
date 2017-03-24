
(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">Kinoue</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kinoue_Amidakuji" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kinoue/Amidakuji.html">Amidakuji</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kinoue_Amidakuji_Exception" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kinoue/Amidakuji/Exception.html">Exception</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kinoue_Amidakuji_Exception_ExceptionInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Exception/ExceptionInterface.html">ExceptionInterface</a>                    </div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Exception_LogicException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Exception/LogicException.html">LogicException</a>                    </div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Exception_RuntimeException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Exception/RuntimeException.html">RuntimeException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kinoue_Amidakuji_Model" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kinoue/Amidakuji/Model.html">Model</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Kinoue_Amidakuji_Model_CustomObject" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kinoue/Amidakuji/Model/CustomObject.html">CustomObject</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kinoue_Amidakuji_Model_CustomObject_HorizontalLineObject" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html">HorizontalLineObject</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Kinoue_Amidakuji_Model_Validation" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Kinoue/Amidakuji/Model/Validation.html">Validation</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Kinoue_Amidakuji_Model_Validation_BaseValidation" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Model/Validation/BaseValidation.html">BaseValidation</a>                    </div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Model_Validation_LineValidation" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Model/Validation/LineValidation.html">LineValidation</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Model_AmidakujiConst" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Model/AmidakujiConst.html">AmidakujiConst</a>                    </div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Model_LineBundler" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Model/LineBundler.html">LineBundler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Kinoue_Amidakuji_Amidakuji" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Kinoue/Amidakuji/Amidakuji.html">Amidakuji</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Kinoue.html", "name": "Kinoue", "doc": "Namespace Kinoue"},{"type": "Namespace", "link": "Kinoue/Amidakuji.html", "name": "Kinoue\\Amidakuji", "doc": "Namespace Kinoue\\Amidakuji"},{"type": "Namespace", "link": "Kinoue/Amidakuji/Exception.html", "name": "Kinoue\\Amidakuji\\Exception", "doc": "Namespace Kinoue\\Amidakuji\\Exception"},{"type": "Namespace", "link": "Kinoue/Amidakuji/Model.html", "name": "Kinoue\\Amidakuji\\Model", "doc": "Namespace Kinoue\\Amidakuji\\Model"},{"type": "Namespace", "link": "Kinoue/Amidakuji/Model/CustomObject.html", "name": "Kinoue\\Amidakuji\\Model\\CustomObject", "doc": "Namespace Kinoue\\Amidakuji\\Model\\CustomObject"},{"type": "Namespace", "link": "Kinoue/Amidakuji/Model/Validation.html", "name": "Kinoue\\Amidakuji\\Model\\Validation", "doc": "Namespace Kinoue\\Amidakuji\\Model\\Validation"},
            {"type": "Interface", "fromName": "Kinoue\\Amidakuji\\Exception", "fromLink": "Kinoue/Amidakuji/Exception.html", "link": "Kinoue/Amidakuji/Exception/ExceptionInterface.html", "name": "Kinoue\\Amidakuji\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            
            {"type": "Class", "fromName": "Kinoue\\Amidakuji", "fromLink": "Kinoue/Amidakuji.html", "link": "Kinoue/Amidakuji/Amidakuji.html", "name": "Kinoue\\Amidakuji\\Amidakuji", "doc": "&quot;\u3042\u307f\u3060\u304f\u3058\u30d7\u30ed\u30b0\u30e9\u30e0\u306e\u30b3\u30f3\u30c8\u30ed\u30fc\u30e9\u30fc\n\u5165\u529b\u5024\u306e\u53d7\u3051\u4ed8\u3051\u3068\u6b63\u89e3\u30eb\u30fc\u30c8\u3092\u8868\u793a\u3059\u308b&quot;"},
                                                        {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Amidakuji", "fromLink": "Kinoue/Amidakuji/Amidakuji.html", "link": "Kinoue/Amidakuji/Amidakuji.html#method___construct", "name": "Kinoue\\Amidakuji\\Amidakuji::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Amidakuji", "fromLink": "Kinoue/Amidakuji/Amidakuji.html", "link": "Kinoue/Amidakuji/Amidakuji.html#method_start", "name": "Kinoue\\Amidakuji\\Amidakuji::start", "doc": "&quot;\u3042\u307f\u3060\u304f\u3058\u30d7\u30ed\u30b0\u30e9\u30e0\u958b\u59cb&quot;"},
            
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Exception", "fromLink": "Kinoue/Amidakuji/Exception.html", "link": "Kinoue/Amidakuji/Exception/ExceptionInterface.html", "name": "Kinoue\\Amidakuji\\Exception\\ExceptionInterface", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Exception", "fromLink": "Kinoue/Amidakuji/Exception.html", "link": "Kinoue/Amidakuji/Exception/LogicException.html", "name": "Kinoue\\Amidakuji\\Exception\\LogicException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Exception", "fromLink": "Kinoue/Amidakuji/Exception.html", "link": "Kinoue/Amidakuji/Exception/RuntimeException.html", "name": "Kinoue\\Amidakuji\\Exception\\RuntimeException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Model", "fromLink": "Kinoue/Amidakuji/Model.html", "link": "Kinoue/Amidakuji/Model/AmidakujiConst.html", "name": "Kinoue\\Amidakuji\\Model\\AmidakujiConst", "doc": "&quot;\u3042\u307f\u3060\u304f\u3058\u30d7\u30ed\u30b0\u30e9\u30e0\u3067\u4f7f\u7528\u3059\u308b\u5b9a\u6570&quot;"},
                    
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "doc": "&quot;\u3042\u307f\u3060\u304f\u3058\u306e\u6a2a\u7dda\u30aa\u30d6\u30b8\u30a7\u30af\u30c8&quot;"},
                                                        {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html#method___construct", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html#method_getStartX", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject::getStartX", "doc": "&quot;\u6a2a\u7dda\u306e\u958b\u59cb\u4f4d\u7f6e\uff08X\u8ef8\uff09&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html#method_getStartY", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject::getStartY", "doc": "&quot;\u6a2a\u7dda\u306e\u958b\u59cb\u4f4d\u7f6e\uff08Y\u8ef8\uff09&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html#method_getEndY", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject::getEndY", "doc": "&quot;\u6a2a\u7dda\u306e\u7d42\u4e86\u4f4d\u7f6e\uff08Y\u8ef8\uff09&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject", "fromLink": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html", "link": "Kinoue/Amidakuji/Model/CustomObject/HorizontalLineObject.html#method_isDirectionRight", "name": "Kinoue\\Amidakuji\\Model\\CustomObject\\HorizontalLineObject::isDirectionRight", "doc": "&quot;\u6a2a\u7dda\u306e\u5411\u304d&quot;"},
            
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Model", "fromLink": "Kinoue/Amidakuji/Model.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html", "name": "Kinoue\\Amidakuji\\Model\\LineBundler", "doc": "&quot;\u3042\u307f\u3060\u304f\u3058\u306e\u7dda\u3092\u307e\u3068\u3081\u3066\u4fdd\u6301\u3057\u3001\n\u6761\u4ef6\u306b\u5fdc\u3058\u305f\u7dda\u306e\u60c5\u5831\u3092\u8fd4\u3059\u30ed\u30b8\u30c3\u30af\u3092\u6301\u3064&quot;"},
                                                        {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method___construct", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_inputInitialSetting", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::inputInitialSetting", "doc": "&quot;\u521d\u671f\u8a2d\u5b9a\u5024\u3092\u5165\u529b&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_inputHorizontalLines", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::inputHorizontalLines", "doc": "&quot;\u6a2a\u7dda\u306e\u60c5\u5831\u3092\u5165\u529b&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getVerticalLengthSetting", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getVerticalLengthSetting", "doc": "&quot;\u8a2d\u5b9a\u3057\u305f\u7e26\u7dda\u306e\u9577\u3055\u306e\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getVerticalLinesSetting", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getVerticalLinesSetting", "doc": "&quot;\u8a2d\u5b9a\u3057\u305f\u7e26\u7dda\u672c\u6570\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getHorizontalLinesSetting", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getHorizontalLinesSetting", "doc": "&quot;\u8a2d\u5b9a\u3057\u305f\u6a2a\u7dda\u672c\u6570\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getHorizontalLineList", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getHorizontalLineList", "doc": "&quot;\u6a2a\u7dda\u30aa\u30d6\u30b8\u30a7\u30af\u30c8\u306e\u30ea\u30b9\u30c8\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getExistsHorizontalLineByX", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getExistsHorizontalLineByX", "doc": "&quot;\u6307\u5b9a\u3057\u305f\u7e26\u7dda\u306b\u5b58\u5728\u3059\u308b\u6a2a\u7dda\u30aa\u30d6\u30b8\u30a7\u30af\u30c8\u306e\u30ea\u30b9\u30c8\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\LineBundler", "fromLink": "Kinoue/Amidakuji/Model/LineBundler.html", "link": "Kinoue/Amidakuji/Model/LineBundler.html#method_getNearestHorizontalLine", "name": "Kinoue\\Amidakuji\\Model\\LineBundler::getNearestHorizontalLine", "doc": "&quot;\u6307\u5b9a\u3057\u305f\u7e26\u7dda\u306e\u70b9\u3088\u308a\u4e0a\u306b\u3042\u308a\u3001\u76f4\u8fd1\u306e\u6a2a\u7dda\u30aa\u30d6\u30b8\u30a7\u30af\u30c8\u3092\u53d6\u5f97&quot;"},
            
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Model\\Validation", "fromLink": "Kinoue/Amidakuji/Model/Validation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "doc": "&quot;\u6c4e\u7528\u7684\u306a\u30c7\u30fc\u30bf\u691c\u8a3c\u306e\u51e6\u7406\u3068\u72b6\u614b\u3092\u6301\u3064&quot;"},
                                                        {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html#method_validInt", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation::validInt", "doc": "&quot;\u6570\u5024\u30c1\u30a7\u30c3\u30af&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html#method_validIntRange", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation::validIntRange", "doc": "&quot;\u6570\u5024\u306e\u7bc4\u56f2\u30c1\u30a7\u30c3\u30af&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html#method_getStatus", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation::getStatus", "doc": "&quot;\u30d0\u30ea\u30c7\u30fc\u30b7\u30e7\u30f3\u306e\u30b9\u30c6\u30fc\u30bf\u30b9\u3092\u8fd4\u3059&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html#method_getErrorMessage", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation::getErrorMessage", "doc": "&quot;\u30a8\u30e9\u30fc\u30e1\u30c3\u30bb\u30fc\u30b8\u3092\u53d6\u5f97&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/BaseValidation.html#method_reset", "name": "Kinoue\\Amidakuji\\Model\\Validation\\BaseValidation::reset", "doc": "&quot;\u72b6\u614b\u3092\u30ea\u30bb\u30c3\u30c8&quot;"},
            
            {"type": "Class", "fromName": "Kinoue\\Amidakuji\\Model\\Validation", "fromLink": "Kinoue/Amidakuji/Model/Validation.html", "link": "Kinoue/Amidakuji/Model/Validation/LineValidation.html", "name": "Kinoue\\Amidakuji\\Model\\Validation\\LineValidation", "doc": "&quot;\u7dda\u306b\u95a2\u3059\u308b\u5165\u529b\u5024\u3092\u691c\u8a3c\u3059\u308b&quot;"},
                                                        {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\LineValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/LineValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/LineValidation.html#method_validInitialSettig", "name": "Kinoue\\Amidakuji\\Model\\Validation\\LineValidation::validInitialSettig", "doc": "&quot;\u521d\u671f\u8a2d\u5b9a\u5024\u306e\u30d0\u30ea\u30c7\u30fc\u30b7\u30e7\u30f3&quot;"},
                    {"type": "Method", "fromName": "Kinoue\\Amidakuji\\Model\\Validation\\LineValidation", "fromLink": "Kinoue/Amidakuji/Model/Validation/LineValidation.html", "link": "Kinoue/Amidakuji/Model/Validation/LineValidation.html#method_validHorizontalLine", "name": "Kinoue\\Amidakuji\\Model\\Validation\\LineValidation::validHorizontalLine", "doc": "&quot;\u6a2a\u7dda\u5165\u529b\u5024\u306e\u30d0\u30ea\u30c7\u30fc\u30b7\u30e7\u30f3&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});



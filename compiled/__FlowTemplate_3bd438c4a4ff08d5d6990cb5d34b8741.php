<?php
// main/home.html 2021-06-25 10:50:04 GMT
class __FlowTemplate_3bd438c4a4ff08d5d6990cb5d34b8741 extends \Flow\Template
{
    const NAME = 'main/home.html';

    public function __construct($loader, $helpers = [])
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = [], $blocks = [], $macros = [], $imports = [])
    {
        /* line 1 -> 15 */
        echo '<html>
	<head>
		<link type="text/css" rel="stylesheet" href="/css/style.css" />
		<script src="/js/main.js"></script>
	</head>
	<body>
		<nav class="nav">
			<li onclick="buttonClick(this)" parameter="';
        /* line 8 -> 24 */
        echo $this->helper('escape', $this->helper('encrypt', 'Stats'));
        /* line 8 -> 26 */
        echo '" data="';
        /* line 8 -> 28 */
        echo $this->helper('escape', $this->helper('encrypt', 'Admin|stats'));
        /* line 8 -> 30 */
        echo '">Overview</li>
			<li onclick="buttonClick(this)" parameter="';
        /* line 9 -> 33 */
        echo $this->helper('escape', $this->helper('encrypt', 'Sites'));
        /* line 9 -> 35 */
        echo '" data="';
        /* line 9 -> 37 */
        echo $this->helper('escape', $this->helper('encrypt', 'Admin|sites'));
        /* line 9 -> 39 */
        echo '">Sites</li>
		</nav>
		<div id="container"></div>
		<div id="Notifications"></div>
	</body>
</html>';
    }

    protected static $lines = array(15=>1,24=>8,26=>8,28=>8,30=>8,33=>9,35=>9,37=>9,39=>9,);
}
// end of main/home.html

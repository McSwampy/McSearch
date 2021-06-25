<?php
// admin/home.html 2021-06-25 12:42:42 GMT
class __FlowTemplate_4434b940e97a3e72b752e2fe6f922ea6 extends \Flow\Template
{
    const NAME = 'admin/home.html';

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
			<img src="/imgs/logo_1.png" alt="McSearch Logo" title="McSearch Logo"/>
			<li onclick="loadPage(this)" parameter="';
        /* line 9 -> 25 */
        echo $this->helper('escape', $this->helper('encrypt', 'Stats'));
        /* line 9 -> 27 */
        echo '" data="';
        /* line 9 -> 29 */
        echo $this->helper('escape', $this->helper('encrypt', 'Admin|stats'));
        /* line 9 -> 31 */
        echo '">Overview</li>
			<li onclick="loadPage(this)" parameter="';
        /* line 10 -> 34 */
        echo $this->helper('escape', $this->helper('encrypt', 'Sites'));
        /* line 10 -> 36 */
        echo '" data="';
        /* line 10 -> 38 */
        echo $this->helper('escape', $this->helper('encrypt', 'Admin|sites'));
        /* line 10 -> 40 */
        echo '">Sites</li>
		</nav>
		<div id="container"></div>
		<div id="Notifications"></div>
	</body>
</html>';
    }

    protected static $lines = array(15=>1,25=>9,27=>9,29=>9,31=>9,34=>10,36=>10,38=>10,40=>10,);
}
// end of admin/home.html

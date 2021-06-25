<?php
// admin/home.html 2021-06-25 14:55:25 GMT
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
		';
        /* line 7 -> 23 */
        if ((isset($context['name']) ? $context['name'] : null) == ($tmp1 = '')) {
            /* line 7 -> 25 */
            echo '
			<div class="form login">
				<img src="/imgs/logo_1.png" alt="McSearch Logo" title="McSearch Logo"/>
				<h1>Log in</h1>
				<input type="text" name="USER" placeholder="Username" autofocus="true" />
				<input type="password" name="PASSWORD" placeholder="Passcode" />
				<button onclick="submitForm(this, 1)" data="';
            /* line 13 -> 33 */
            echo $this->helper('escape', $this->helper('encrypt', 'User|login'));
            /* line 13 -> 35 */
            echo '">Log In</button>
			</div>
		';
        } else {
            /* line 15 -> 40 */
            echo '
			<nav class="nav">
				<img src="/imgs/logo_1.png" alt="McSearch Logo" title="McSearch Logo"/>
				<label class="username">';
            /* line 18 -> 45 */
            echo $this->helper('escape', (isset($context['name']) ? $context['name'] : null));
            /* line 18 -> 47 */
            echo '</label>
				<li onclick="loadPage(this)" parameter="';
            /* line 19 -> 50 */
            echo $this->helper('escape', $this->helper('encrypt', 'Stats'));
            /* line 19 -> 52 */
            echo '" data="';
            /* line 19 -> 54 */
            echo $this->helper('escape', $this->helper('encrypt', 'Admin|stats'));
            /* line 19 -> 56 */
            echo '">Overview</li>
				<li onclick="loadPage(this)" parameter="';
            /* line 20 -> 59 */
            echo $this->helper('escape', $this->helper('encrypt', 'Sites'));
            /* line 20 -> 61 */
            echo '" data="';
            /* line 20 -> 63 */
            echo $this->helper('escape', $this->helper('encrypt', 'Admin|sites'));
            /* line 20 -> 65 */
            echo '">Sites</li>
				<li onclick="loadPage(this)" parameter="';
            /* line 21 -> 68 */
            echo $this->helper('escape', $this->helper('encrypt', 'Sites'));
            /* line 21 -> 70 */
            echo '" data="';
            /* line 21 -> 72 */
            echo $this->helper('escape', $this->helper('encrypt', 'User|list'));
            /* line 21 -> 74 */
            echo '">Users</li>
			</nav>
			<div id="container"></div>
		';
        }
        /* line 24 -> 80 */
        echo '
		<div id="Notifications"></div>
	</body>
</html>';
    }

    protected static $lines = array(15=>1,23=>7,25=>7,33=>13,35=>13,40=>15,45=>18,47=>18,50=>19,52=>19,54=>19,56=>19,59=>20,61=>20,63=>20,65=>20,68=>21,70=>21,72=>21,74=>21,80=>24,);
}
// end of admin/home.html

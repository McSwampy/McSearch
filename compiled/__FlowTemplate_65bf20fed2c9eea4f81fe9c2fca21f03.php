<?php
// admin/sites.html 2021-06-25 12:43:44 GMT
class __FlowTemplate_65bf20fed2c9eea4f81fe9c2fca21f03 extends \Flow\Template
{
    const NAME = 'admin/sites.html';

    public function __construct($loader, $helpers = [])
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = [], $blocks = [], $macros = [], $imports = [])
    {
        /* line 1 -> 15 */
        echo '<div class="toolbar">
	<label>Search:</label>
	<input
		id="search_field"
		type="text"
		placeholder="Search term"
		value="';
        /* line 7 -> 23 */
        echo $this->helper('escape', (isset($context['SEARCH']) ? $context['SEARCH'] : null));
        /* line 7 -> 25 */
        echo '"
	/>
	<button onclick="search(this)" from="search_field">Search</button>
</div>
<table class="full">
	<thead>
		<tr>
			<td>ID</td>
			<td>Host</td>
			<td>Last Ran</td>
			<td>Load Time</td>
			<td>Proxy</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		';
        /* line 23 -> 43 */
        $this->pushContext($context, 'loop');
        $this->pushContext($context, 'R');
        foreach (($context['loop'] = $this->iterate($context, (isset($context['SITES']) ? $context['SITES'] : null))) as $context['R']) {
            /* line 23 -> 47 */
            echo '
			<tr id="row';
            /* line 24 -> 50 */
            echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'id', false));
            /* line 24 -> 52 */
            echo '">
				<td>';
            /* line 25 -> 55 */
            echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'id', false));
            /* line 25 -> 57 */
            echo '</td>
				<td>';
            /* line 26 -> 60 */
            echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'host', false));
            /* line 26 -> 62 */
            echo '</td>
				<td>';
            /* line 27 -> 65 */
            echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'last_ran', false));
            /* line 27 -> 67 */
            echo '</td>
				<td>';
            /* line 28 -> 70 */
            echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'load_time', false));
            /* line 28 -> 72 */
            echo '</td>
				<td>
					';
            /* line 30 -> 76 */
            if ($this->getAttr((isset($context['R']) ? $context['R'] : null), 'use_proxy', false) == ($tmp1 = 0)) {
                /* line 30 -> 78 */
                echo '
						N
					';
            } else {
                /* line 32 -> 83 */
                echo '
						Y
					';
            }
            /* line 34 -> 88 */
            echo '
				</td>
				<td>
					';
            /* line 37 -> 93 */
            if ($this->getAttr((isset($context['R']) ? $context['R'] : null), 'indexed', false)) {
                /* line 37 -> 95 */
                echo '
						<button
							onclick="buttonClick(this)"
							parameter="';
                /* line 40 -> 100 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['R']) ? $context['R'] : null)));
                /* line 40 -> 102 */
                echo '"
							data="';
                /* line 41 -> 105 */
                echo $this->helper('escape', $this->helper('encrypt', 'Sites|index'));
                /* line 41 -> 107 */
                echo '"
						>Re-Index</button>
					';
            } else {
                /* line 43 -> 112 */
                echo '
						<button
							onclick="buttonClick(this)"
							parameter="';
                /* line 46 -> 117 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['R']) ? $context['R'] : null)));
                /* line 46 -> 119 */
                echo '"
							data="';
                /* line 47 -> 122 */
                echo $this->helper('escape', $this->helper('encrypt', 'Sites|index'));
                /* line 47 -> 124 */
                echo '"
						>Index</button>
					';
            }
            /* line 49 -> 129 */
            echo '
					';
            /* line 50 -> 132 */
            if ($this->getAttr((isset($context['R']) ? $context['R'] : null), 'active', false)) {
                /* line 50 -> 134 */
                echo '
						<button
							id="site_toggle_';
                /* line 52 -> 138 */
                echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'id', false));
                /* line 52 -> 140 */
                echo '"
							class="warning"
							onclick="buttonClick(this)"
							parameter="';
                /* line 55 -> 145 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['R']) ? $context['R'] : null)));
                /* line 55 -> 147 */
                echo '"
							data="';
                /* line 56 -> 150 */
                echo $this->helper('escape', $this->helper('encrypt', 'Sites|toggleEnabled'));
                /* line 56 -> 152 */
                echo '"
						>Disable</button>
					';
            } else {
                /* line 58 -> 157 */
                echo '
						<button
							id="site_toggle_';
                /* line 60 -> 161 */
                echo $this->helper('escape', $this->getAttr((isset($context['R']) ? $context['R'] : null), 'id', false));
                /* line 60 -> 163 */
                echo '"
							class="good"
							onclick="buttonClick(this)"
							parameter="';
                /* line 63 -> 168 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['R']) ? $context['R'] : null)));
                /* line 63 -> 170 */
                echo '"
							data="';
                /* line 64 -> 173 */
                echo $this->helper('escape', $this->helper('encrypt', 'Sites|toggleEnabled'));
                /* line 64 -> 175 */
                echo '"
						>Enable</button>
					';
            }
            /* line 66 -> 180 */
            echo '
				</td>
			</tr>
		';
        }
        $this->popContext($context, 'loop');
        $this->popContext($context, 'R');
        /* line 69 -> 188 */
        echo '
	</tbody>
</table>';
    }

    protected static $lines = array(15=>1,23=>7,25=>7,43=>23,47=>23,50=>24,52=>24,55=>25,57=>25,60=>26,62=>26,65=>27,67=>27,70=>28,72=>28,76=>30,78=>30,83=>32,88=>34,93=>37,95=>37,100=>40,102=>40,105=>41,107=>41,112=>43,117=>46,119=>46,122=>47,124=>47,129=>49,132=>50,134=>50,138=>52,140=>52,145=>55,147=>55,150=>56,152=>56,157=>58,161=>60,163=>60,168=>63,170=>63,173=>64,175=>64,180=>66,188=>69,);
}
// end of admin/sites.html

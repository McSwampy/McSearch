<?php
// admin/users.html 2021-06-25 14:55:28 GMT
class __FlowTemplate_336632d1d62424a953599a800765e3d5 extends \Flow\Template
{
    const NAME = 'admin/users.html';

    public function __construct($loader, $helpers = [])
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = [], $blocks = [], $macros = [], $imports = [])
    {
        /* line 1 -> 15 */
        echo '<table class="full">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Active</td>
		</tr>
	</thead>
	<tbody>
		';
        /* line 10 -> 26 */
        $this->pushContext($context, 'loop');
        $this->pushContext($context, 'U');
        foreach (($context['loop'] = $this->iterate($context, (isset($context['USERS']) ? $context['USERS'] : null))) as $context['U']) {
            /* line 10 -> 30 */
            echo '
			<tr>
				<td>';
            /* line 12 -> 34 */
            echo $this->helper('escape', $this->getAttr((isset($context['U']) ? $context['U'] : null), 'id', false));
            /* line 12 -> 36 */
            echo '</td>
				<td>';
            /* line 13 -> 39 */
            echo $this->helper('escape', $this->getAttr((isset($context['U']) ? $context['U'] : null), 'name', false));
            /* line 13 -> 41 */
            echo '</td>
				<td>
					';
            /* line 15 -> 45 */
            if ($this->getAttr((isset($context['U']) ? $context['U'] : null), 'active', false)) {
                /* line 15 -> 47 */
                echo '
						<button
							id="user_toggle_';
                /* line 17 -> 51 */
                echo $this->helper('escape', $this->getAttr((isset($context['U']) ? $context['U'] : null), 'id', false));
                /* line 17 -> 53 */
                echo '"
							class="warning"
							onclick="buttonClick(this)"
							parameter="';
                /* line 20 -> 58 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['U']) ? $context['U'] : null)));
                /* line 20 -> 60 */
                echo '"
							data="';
                /* line 21 -> 63 */
                echo $this->helper('escape', $this->helper('encrypt', 'Admin|toggleEnableUser'));
                /* line 21 -> 65 */
                echo '"
						>Disable</button>
					';
            } else {
                /* line 23 -> 70 */
                echo '
						<button
							id="user_toggle_';
                /* line 25 -> 74 */
                echo $this->helper('escape', $this->getAttr((isset($context['U']) ? $context['U'] : null), 'id', false));
                /* line 25 -> 76 */
                echo '"
							class="good"
							onclick="buttonClick(this)"
							parameter="';
                /* line 28 -> 81 */
                echo $this->helper('escape', $this->helper('encrypt', (isset($context['U']) ? $context['U'] : null)));
                /* line 28 -> 83 */
                echo '"
							data="';
                /* line 29 -> 86 */
                echo $this->helper('escape', $this->helper('encrypt', 'Admin|toggleEnableUser'));
                /* line 29 -> 88 */
                echo '"
						>Enable</button>
					';
            }
            /* line 31 -> 93 */
            echo '
				</td>
			</tr>
		';
        }
        $this->popContext($context, 'loop');
        $this->popContext($context, 'U');
        /* line 34 -> 101 */
        echo '
	</tbody>
</table>';
    }

    protected static $lines = array(15=>1,26=>10,30=>10,34=>12,36=>12,39=>13,41=>13,45=>15,47=>15,51=>17,53=>17,58=>20,60=>20,63=>21,65=>21,70=>23,74=>25,76=>25,81=>28,83=>28,86=>29,88=>29,93=>31,101=>34,);
}
// end of admin/users.html

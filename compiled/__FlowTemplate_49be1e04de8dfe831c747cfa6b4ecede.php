<?php
// admin/stats.html 2021-06-25 12:43:43 GMT
class __FlowTemplate_49be1e04de8dfe831c747cfa6b4ecede extends \Flow\Template
{
    const NAME = 'admin/stats.html';

    public function __construct($loader, $helpers = [])
    {
        parent::__construct($loader, $helpers);
    }

    public function display($context = [], $blocks = [], $macros = [], $imports = [])
    {
        /* line 1 -> 15 */
        echo '<table>
	<tbody>
		<tr>
			<td>Total Sites</td>
			<td>';
        /* line 5 -> 21 */
        echo $this->helper('escape', (isset($context['TOTAL_SITES']) ? $context['TOTAL_SITES'] : null));
        /* line 5 -> 23 */
        echo '</td>
		</tr>
	</tbody>
</table>';
    }

    protected static $lines = array(15=>1,21=>5,23=>5,);
}
// end of admin/stats.html

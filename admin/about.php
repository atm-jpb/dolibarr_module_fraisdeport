<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) 2013 ATM Consulting <support@atm-consulting.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * 	\file		admin/about.php
 * 	\ingroup	mymodule
 * 	\brief		This file is an example about page
 * 				Put some comments here
 */
// Dolibarr environment
$res = @include("../../main.inc.php"); // From htdocs directory
if (! $res) {
    $res = @include("../../../main.inc.php"); // From "custom" directory
}


// Libraries
require_once DOL_DOCUMENT_ROOT . "/core/lib/admin.lib.php";
require_once '../lib/fraisdeport.lib.php';

dol_include_once('/mymodule/lib/php-markdown/markdown.php');


//require_once "../class/myclass.class.php";
// Translations
$langs->load("fraisdeport@fraisdeport");

// Access control
if (! $user->admin) {
    accessforbidden();
}

// Parameters
$action = GETPOST('action', 'alpha');

/*
 * Actions
 */

/*
 * View
 */
$page_name = "MyModuleAbout";
llxHeader('', $langs->trans($page_name));

// Subheader
$linkback = '<a href="' . DOL_URL_ROOT . '/admin/modules.php">'
    . $langs->trans("BackToModuleList") . '</a>';
print_fiche_titre($langs->trans($page_name), $linkback);

// Configuration header
$head = fraisdeportAdminPrepareHead();
dol_fiche_head(
    $head,
    'about',
    $langs->trans("Module104150Name"),
    0,
    'mymodule@mymodule'
);

?>
	<table width="100%" class="noborder">
		<tr class="liste_titre">
			<td>A propos</td>
			<td align="center">&nbsp;</td>
			</tr>
			<tr class="impair">
				<td valign="top">Module développé par </td>
				<td align="center">
					<img src="<?php echo DOL_URL_ROOT; ?>/custom/fraisdeport/img/logo2-w-small.png" align="absmiddle"/>
					
				</td>
				
			</td>
		</tr>
	</table>
<?php

echo '<br>',
'<a href="' . dol_buildpath('/mymodule/COPYING', 1) . '">',
'<img src="' . dol_buildpath('/mymodule/img/gplv3.png', 1) . '"/>',
'</a>';

$db->close();

llxFooter();

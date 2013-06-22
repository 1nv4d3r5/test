[33mcommit 5f1bf83632d06e9ce988e9f33e7b3740324ddcd9[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Fri Jun 21 13:58:38 2013 -0500

    Different versions of EASY project(archived) added!

 easy.rar     | Bin [31m0[m -> [32m1531051[m bytes
 easy1.01.rar | Bin [31m0[m -> [32m1927888[m bytes
 easy1.02.rar | Bin [31m0[m -> [32m1919708[m bytes
 easy1.03.rar | Bin [31m0[m -> [32m1921630[m bytes
 4 files changed, 0 insertions(+), 0 deletions(-)

[33mcommit 525ddd7470921b40f9bd72e6acb691a3da9d15ae[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Fri Jun 21 13:53:03 2013 -0500

    db file for easy added!

 easy/white.sql | 435 [32m+++++++++++++++++++++++++++++++++++++++++++++++++++++++++[m
 1 file changed, 435 insertions(+)

[33mcommit 36dd1666440c7ae6faf615b3e3f4febeb10e5662[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Fri Jun 21 13:48:42 2013 -0500

    zip file for EASY project added

 .gitignore |  25 [32m+++++++++++++++++++++++++[m
 easy.zip   | Bin [31m0[m -> [32m1906110[m bytes
 2 files changed, 25 insertions(+)

[33mcommit 187c2b6facd150635cf4cf5c8983a0f58dc39820[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Fri Jun 21 13:37:43 2013 -0500

    New Project EASY created!

 easy/about-us.php                                  |   71 [32m+[m
 easy/addons/lang_en_US.php                         |   10 [32m+[m
 easy/admin/admin.php                               |  965 [32m+++++++++++++[m
 easy/admin/atom.php                                |   73 [32m+[m
 easy/admin/common.php                              |  879 [32m++++++++++++[m
 easy/admin/index.html                              |    6 [32m+[m
 easy/admin/lastnews.php                            |   27 [32m+[m
 easy/admin/main.php                                |  399 [32m++++++[m
 easy/admin/rss.php                                 |   38 [32m+[m
 easy/admin/runtime.php                             |  154 [32m++[m
 easy/admissions.php                                |   71 [32m+[m
 easy/career.php                                    |   71 [32m+[m
 easy/contact-us.php                                |   71 [32m+[m
 easy/css/lightneasy.css                            |  256 [32m++++[m
 easy/css/lytebox.css                               |   93 [32m++[m
 easy/data/catchpa.png                              |  Bin [31m0[m -> [32m224[m bytes
 easy/data/database.php                             |    8 [32m+[m
 easy/data/index.html                               |    1 [32m+[m
 easy/downloads/index.html                          |    1 [32m+[m
 .../editor/_source/classes/fckcontextmenu.js       |  223 [32m+++[m
 .../editor/_source/classes/fckdataprocessor.js     |  119 [32m++[m
 .../_source/classes/fckdocumentfragment_gecko.js   |   53 [32m+[m
 .../_source/classes/fckdocumentfragment_ie.js      |   58 [32m+[m
 .../editor/_source/classes/fckdomrange.js          |  935 [32m++++++++++++[m
 .../editor/_source/classes/fckdomrange_gecko.js    |  104 [32m++[m
 .../editor/_source/classes/fckdomrange_ie.js       |  199 [32m+++[m
 .../editor/_source/classes/fckdomrangeiterator.js  |  327 [32m+++++[m
 .../editor/_source/classes/fckeditingarea.js       |  368 [32m+++++[m
 .../editor/_source/classes/fckelementpath.js       |   89 [32m++[m
 .../editor/_source/classes/fckenterkey.js          |  708 [32m+++++++++[m
 easy/fckeditor/editor/_source/classes/fckevents.js |   71 [32m+[m
 .../editor/_source/classes/fckhtmliterator.js      |  142 [32m++[m
 easy/fckeditor/editor/_source/classes/fckicon.js   |  103 [32m++[m
 .../editor/_source/classes/fckiecleanup.js         |   68 [32m+[m
 .../editor/_source/classes/fckimagepreloader.js    |   64 [32m+[m
 .../editor/_source/classes/fckkeystrokehandler.js  |  141 [32m++[m
 .../editor/_source/classes/fckmenublock.js         |  153 [32m++[m
 .../editor/_source/classes/fckmenublockpanel.js    |   54 [32m+[m
 .../editor/_source/classes/fckmenuitem.js          |  161 [32m+++[m
 easy/fckeditor/editor/_source/classes/fckpanel.js  |  463 [32m++++++[m
 easy/fckeditor/editor/_source/classes/fckplugin.js |   56 [32m+[m
 .../editor/_source/classes/fckspecialcombo.js      |  376 [32m+++++[m
 easy/fckeditor/editor/_source/classes/fckstyle.js  | 1500 [32m++++++++++++++++++++[m
 .../fckeditor/editor/_source/classes/fcktoolbar.js |  103 [32m++[m
 .../_source/classes/fcktoolbarbreak_gecko.js       |   36 [32m+[m
 .../editor/_source/classes/fcktoolbarbreak_ie.js   |   38 [32m+[m
 .../editor/_source/classes/fcktoolbarbutton.js     |   81 [32m++[m
 .../editor/_source/classes/fcktoolbarbuttonui.js   |  198 [32m+++[m
 .../_source/classes/fcktoolbarfontformatcombo.js   |  139 [32m++[m
 .../editor/_source/classes/fcktoolbarfontscombo.js |   98 [32m++[m
 .../_source/classes/fcktoolbarfontsizecombo.js     |   76 [32m+[m
 .../_source/classes/fcktoolbarpanelbutton.js       |  103 [32m++[m
 .../_source/classes/fcktoolbarspecialcombo.js      |  146 [32m++[m
 .../editor/_source/classes/fcktoolbarstylecombo.js |  200 [32m+++[m
 .../editor/_source/classes/fckw3crange.js          |  451 [32m++++++[m
 easy/fckeditor/editor/_source/classes/fckxml.js    |  108 [32m++[m
 .../editor/_source/classes/fckxml_gecko.js         |  106 [32m++[m
 easy/fckeditor/editor/_source/classes/fckxml_ie.js |   93 [32m++[m
 .../_source/commandclasses/fck_othercommands.js    |  634 [32m+++++++++[m
 .../_source/commandclasses/fckblockquotecommand.js |  281 [32m++++[m
 .../_source/commandclasses/fckcorestylecommand.js  |   61 [32m+[m
 .../editor/_source/commandclasses/fckfitwindow.js  |  213 [32m+++[m
 .../_source/commandclasses/fckindentcommands.js    |  282 [32m++++[m
 .../_source/commandclasses/fckjustifycommands.js   |  173 [32m+++[m
 .../_source/commandclasses/fcklistcommands.js      |  382 [32m+++++[m
 .../_source/commandclasses/fcknamedcommand.js      |   39 [32m+[m
 .../commandclasses/fckpasteplaintextcommand.js     |   40 [32m+[m
 .../_source/commandclasses/fckpastewordcommand.js  |   40 [32m+[m
 .../commandclasses/fckremoveformatcommand.js       |   45 [32m+[m
 .../editor/_source/commandclasses/fckshowblocks.js |   94 [32m++[m
 .../commandclasses/fckspellcheckcommand_gecko.js   |   49 [32m+[m
 .../commandclasses/fckspellcheckcommand_ie.js      |   72 [32m+[m
 .../_source/commandclasses/fckstylecommand.js      |   60 [32m+[m
 .../_source/commandclasses/fcktablecommand.js      |  106 [32m++[m
 .../_source/commandclasses/fcktextcolorcommand.js  |  201 [32m+++[m
 easy/fckeditor/editor/_source/fckconstants.js      |   56 [32m+[m
 easy/fckeditor/editor/_source/fckeditorapi.js      |  179 [32m+++[m
 .../editor/_source/fckjscoreextensions.js          |  159 [32m+++[m
 easy/fckeditor/editor/_source/fckscriptloader.js   |  122 [32m++[m
 easy/fckeditor/editor/_source/internals/fck.js     | 1256 [32m++++++++++++++++[m
 .../editor/_source/internals/fck_contextmenu.js    |  345 [32m+++++[m
 .../editor/_source/internals/fck_gecko.js          |  497 [32m+++++++[m
 easy/fckeditor/editor/_source/internals/fck_ie.js  |  456 [32m++++++[m
 .../editor/_source/internals/fckbrowserinfo.js     |   61 [32m+[m
 .../editor/_source/internals/fckcodeformatter.js   |  100 [32m++[m
 .../editor/_source/internals/fckcommands.js        |  172 [32m+++[m
 .../editor/_source/internals/fckconfig.js          |  237 [32m++++[m
 .../fckeditor/editor/_source/internals/fckdebug.js |   59 [32m+[m
 .../editor/_source/internals/fckdebug_empty.js     |   31 [32m+[m
 .../editor/_source/internals/fckdialog.js          |  239 [32m++++[m
 .../_source/internals/fckdocumentprocessor.js      |  270 [32m++++[m
 .../editor/_source/internals/fckdomtools.js        | 1057 [32m++++++++++++++[m
 .../editor/_source/internals/fcklanguagemanager.js |  165 [32m+++[m
 .../editor/_source/internals/fcklisthandler.js     |  152 [32m++[m
 .../editor/_source/internals/fcklistslib.js        |   63 [32m+[m
 .../editor/_source/internals/fckplugins.js         |   46 [32m+[m
 .../editor/_source/internals/fckregexlib.js        |  100 [32m++[m
 .../editor/_source/internals/fckselection.js       |   42 [32m+[m
 .../editor/_source/internals/fckselection_gecko.js |  228 [32m+++[m
 .../editor/_source/internals/fckselection_ie.js    |  287 [32m++++[m
 .../editor/_source/internals/fckstyles.js          |  381 [32m+++++[m
 .../editor/_source/internals/fcktablehandler.js    |  863 [32m+++++++++++[m
 .../_source/internals/fcktablehandler_gecko.js     |   56 [32m+[m
 .../editor/_source/internals/fcktablehandler_ie.js |   64 [32m+[m
 .../editor/_source/internals/fcktoolbaritems.js    |  124 [32m++[m
 .../editor/_source/internals/fcktoolbarset.js      |  399 [32m++++++[m
 .../fckeditor/editor/_source/internals/fcktools.js |  749 [32m++++++++++[m
 .../editor/_source/internals/fcktools_gecko.js     |  282 [32m++++[m
 .../editor/_source/internals/fcktools_ie.js        |  234 [32m+++[m
 easy/fckeditor/editor/_source/internals/fckundo.js |  223 [32m+++[m
 .../editor/_source/internals/fckurlparams.js       |   39 [32m+[m
 .../fckeditor/editor/_source/internals/fckxhtml.js |  534 [32m+++++++[m
 .../editor/_source/internals/fckxhtml_gecko.js     |  114 [32m++[m
 .../editor/_source/internals/fckxhtml_ie.js        |  213 [32m+++[m
 .../editor/_source/internals/fckxhtmlentities.js   |  357 [32m+++++[m
 .../editor/css/behaviors/disablehandles.htc        |   15 [32m+[m
 .../editor/css/behaviors/showtableborders.htc      |   36 [32m+[m
 easy/fckeditor/editor/css/fck_editorarea.css       |  110 [32m++[m
 easy/fckeditor/editor/css/fck_internal.css         |  199 [32m+++[m
 .../editor/css/fck_showtableborders_gecko.css      |   49 [32m+[m
 easy/fckeditor/editor/css/images/block_address.png |  Bin [31m0[m -> [32m288[m bytes
 .../editor/css/images/block_blockquote.png         |  Bin [31m0[m -> [32m293[m bytes
 easy/fckeditor/editor/css/images/block_div.png     |  Bin [31m0[m -> [32m229[m bytes
 easy/fckeditor/editor/css/images/block_h1.png      |  Bin [31m0[m -> [32m218[m bytes
 easy/fckeditor/editor/css/images/block_h2.png      |  Bin [31m0[m -> [32m220[m bytes
 easy/fckeditor/editor/css/images/block_h3.png      |  Bin [31m0[m -> [32m219[m bytes
 easy/fckeditor/editor/css/images/block_h4.png      |  Bin [31m0[m -> [32m229[m bytes
 easy/fckeditor/editor/css/images/block_h5.png      |  Bin [31m0[m -> [32m236[m bytes
 easy/fckeditor/editor/css/images/block_h6.png      |  Bin [31m0[m -> [32m216[m bytes
 easy/fckeditor/editor/css/images/block_p.png       |  Bin [31m0[m -> [32m205[m bytes
 easy/fckeditor/editor/css/images/block_pre.png     |  Bin [31m0[m -> [32m223[m bytes
 easy/fckeditor/editor/css/images/fck_anchor.gif    |  Bin [31m0[m -> [32m184[m bytes
 easy/fckeditor/editor/css/images/fck_flashlogo.gif |  Bin [31m0[m -> [32m599[m bytes
 .../editor/css/images/fck_hiddenfield.gif          |  Bin [31m0[m -> [32m105[m bytes
 easy/fckeditor/editor/css/images/fck_pagebreak.gif |  Bin [31m0[m -> [32m54[m bytes
 easy/fckeditor/editor/css/images/fck_plugin.gif    |  Bin [31m0[m -> [32m1709[m bytes
 .../editor/dialog/common/fck_dialog_common.css     |   85 [32m++[m
 .../editor/dialog/common/fck_dialog_common.js      |  347 [32m+++++[m
 .../editor/dialog/common/images/locked.gif         |  Bin [31m0[m -> [32m74[m bytes
 .../editor/dialog/common/images/reset.gif          |  Bin [31m0[m -> [32m104[m bytes
 .../editor/dialog/common/images/unlocked.gif       |  Bin [31m0[m -> [32m75[m bytes
 easy/fckeditor/editor/dialog/fck_about.html        |  161 [32m+++[m
 .../editor/dialog/fck_about/logo_fckeditor.gif     |  Bin [31m0[m -> [32m2044[m bytes
 .../editor/dialog/fck_about/logo_fredck.gif        |  Bin [31m0[m -> [32m920[m bytes
 .../dialog/fck_about/sponsors/spellchecker_net.gif |  Bin [31m0[m -> [32m1447[m bytes
 easy/fckeditor/editor/dialog/fck_anchor.html       |  220 [32m+++[m
 easy/fckeditor/editor/dialog/fck_button.html       |  104 [32m++[m
 easy/fckeditor/editor/dialog/fck_checkbox.html     |  104 [32m++[m
 .../fckeditor/editor/dialog/fck_colorselector.html |  172 [32m+++[m
 easy/fckeditor/editor/dialog/fck_div.html          |  396 [32m++++++[m
 easy/fckeditor/editor/dialog/fck_docprops.html     |  600 [32m++++++++[m
 .../dialog/fck_docprops/fck_document_preview.html  |  113 [32m++[m
 easy/fckeditor/editor/dialog/fck_flash.html        |  152 [32m++[m
 .../fckeditor/editor/dialog/fck_flash/fck_flash.js |  300 [32m++++[m
 .../editor/dialog/fck_flash/fck_flash_preview.html |   50 [32m+[m
 easy/fckeditor/editor/dialog/fck_form.html         |  109 [32m++[m
 easy/fckeditor/editor/dialog/fck_hiddenfield.html  |  115 [32m++[m
 easy/fckeditor/editor/dialog/fck_image.html        |  258 [32m++++[m
 .../fckeditor/editor/dialog/fck_image/fck_image.js |  512 [32m+++++++[m
 .../editor/dialog/fck_image/fck_image_preview.html |   72 [32m+[m
 easy/fckeditor/editor/dialog/fck_link.html         |  295 [32m++++[m
 easy/fckeditor/editor/dialog/fck_link/fck_link.js  |  893 [32m++++++++++++[m
 easy/fckeditor/editor/dialog/fck_listprop.html     |  120 [32m++[m
 easy/fckeditor/editor/dialog/fck_paste.html        |  347 [32m+++++[m
 easy/fckeditor/editor/dialog/fck_radiobutton.html  |  104 [32m++[m
 easy/fckeditor/editor/dialog/fck_replace.html      |  650 [32m+++++++++[m
 easy/fckeditor/editor/dialog/fck_select.html       |  180 [32m+++[m
 .../editor/dialog/fck_select/fck_select.js         |  194 [32m+++[m
 easy/fckeditor/editor/dialog/fck_smiley.html       |  111 [32m++[m
 easy/fckeditor/editor/dialog/fck_source.html       |   68 [32m+[m
 easy/fckeditor/editor/dialog/fck_specialchar.html  |  121 [32m++[m
 easy/fckeditor/editor/dialog/fck_spellerpages.html |   70 [32m+[m
 .../fck_spellerpages/spellerpages/blank.html       |    0
 .../fck_spellerpages/spellerpages/controlWindow.js |   87 [32m++[m
 .../fck_spellerpages/spellerpages/controls.html    |  153 [32m++[m
 .../spellerpages/server-scripts/spellchecker.cfm   |  148 [32m++[m
 .../spellerpages/server-scripts/spellchecker.php   |  199 [32m+++[m
 .../spellerpages/server-scripts/spellchecker.pl    |  181 [32m+++[m
 .../fck_spellerpages/spellerpages/spellChecker.js  |  461 [32m++++++[m
 .../spellerpages/spellchecker.html                 |   71 [32m+[m
 .../fck_spellerpages/spellerpages/spellerStyle.css |   49 [32m+[m
 .../fck_spellerpages/spellerpages/wordWindow.js    |  272 [32m++++[m
 easy/fckeditor/editor/dialog/fck_table.html        |  439 [32m++++++[m
 easy/fckeditor/editor/dialog/fck_tablecell.html    |  293 [32m++++[m
 easy/fckeditor/editor/dialog/fck_template.html     |  242 [32m++++[m
 .../dialog/fck_template/images/template1.gif       |  Bin [31m0[m -> [32m375[m bytes
 .../dialog/fck_template/images/template2.gif       |  Bin [31m0[m -> [32m333[m bytes
 .../dialog/fck_template/images/template3.gif       |  Bin [31m0[m -> [32m422[m bytes
 easy/fckeditor/editor/dialog/fck_textarea.html     |   94 [32m++[m
 easy/fckeditor/editor/dialog/fck_textfield.html    |  136 [32m++[m
 easy/fckeditor/editor/dtd/fck_dtd_test.html        |   41 [32m+[m
 easy/fckeditor/editor/dtd/fck_xhtml10strict.js     |  116 [32m++[m
 .../editor/dtd/fck_xhtml10transitional.js          |  140 [32m++[m
 easy/fckeditor/editor/fckdebug.html                |  153 [32m++[m
 easy/fckeditor/editor/fckdialog.html               |  819 [32m+++++++++++[m
 easy/fckeditor/editor/fckeditor.html               |  317 [32m+++++[m
 easy/fckeditor/editor/fckeditor.original.html      |  424 [32m++++++[m
 .../editor/filemanager/browser/default/browser.css |   87 [32m++[m
 .../filemanager/browser/default/browser.html       |  200 [32m+++[m
 .../browser/default/frmactualfolder.html           |   95 [32m++[m
 .../browser/default/frmcreatefolder.html           |  114 [32m++[m
 .../filemanager/browser/default/frmfolders.html    |  198 [32m+++[m
 .../browser/default/frmresourceslist.html          |  169 [32m+++[m
 .../browser/default/frmresourcetype.html           |   69 [32m+[m
 .../filemanager/browser/default/frmupload.html     |  115 [32m++[m
 .../browser/default/images/ButtonArrow.gif         |  Bin [31m0[m -> [32m138[m bytes
 .../filemanager/browser/default/images/Folder.gif  |  Bin [31m0[m -> [32m128[m bytes
 .../browser/default/images/Folder32.gif            |  Bin [31m0[m -> [32m281[m bytes
 .../browser/default/images/FolderOpened.gif        |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/FolderOpened32.gif      |  Bin [31m0[m -> [32m264[m bytes
 .../browser/default/images/FolderUp.gif            |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/icons/32/ai.gif         |  Bin [31m0[m -> [32m1140[m bytes
 .../browser/default/images/icons/32/avi.gif        |  Bin [31m0[m -> [32m454[m bytes
 .../browser/default/images/icons/32/bmp.gif        |  Bin [31m0[m -> [32m709[m bytes
 .../browser/default/images/icons/32/cs.gif         |  Bin [31m0[m -> [32m224[m bytes
 .../default/images/icons/32/default.icon.gif       |  Bin [31m0[m -> [32m177[m bytes
 .../browser/default/images/icons/32/dll.gif        |  Bin [31m0[m -> [32m258[m bytes
 .../browser/default/images/icons/32/doc.gif        |  Bin [31m0[m -> [32m260[m bytes
 .../browser/default/images/icons/32/exe.gif        |  Bin [31m0[m -> [32m170[m bytes
 .../browser/default/images/icons/32/fla.gif        |  Bin [31m0[m -> [32m946[m bytes
 .../browser/default/images/icons/32/gif.gif        |  Bin [31m0[m -> [32m704[m bytes
 .../browser/default/images/icons/32/htm.gif        |  Bin [31m0[m -> [32m1527[m bytes
 .../browser/default/images/icons/32/html.gif       |  Bin [31m0[m -> [32m1527[m bytes
 .../browser/default/images/icons/32/jpg.gif        |  Bin [31m0[m -> [32m463[m bytes
 .../browser/default/images/icons/32/js.gif         |  Bin [31m0[m -> [32m274[m bytes
 .../browser/default/images/icons/32/mdb.gif        |  Bin [31m0[m -> [32m274[m bytes
 .../browser/default/images/icons/32/mp3.gif        |  Bin [31m0[m -> [32m454[m bytes
 .../browser/default/images/icons/32/pdf.gif        |  Bin [31m0[m -> [32m567[m bytes
 .../browser/default/images/icons/32/png.gif        |  Bin [31m0[m -> [32m464[m bytes
 .../browser/default/images/icons/32/ppt.gif        |  Bin [31m0[m -> [32m254[m bytes
 .../browser/default/images/icons/32/rdp.gif        |  Bin [31m0[m -> [32m1493[m bytes
 .../browser/default/images/icons/32/swf.gif        |  Bin [31m0[m -> [32m725[m bytes
 .../browser/default/images/icons/32/swt.gif        |  Bin [31m0[m -> [32m724[m bytes
 .../browser/default/images/icons/32/txt.gif        |  Bin [31m0[m -> [32m213[m bytes
 .../browser/default/images/icons/32/vsd.gif        |  Bin [31m0[m -> [32m277[m bytes
 .../browser/default/images/icons/32/xls.gif        |  Bin [31m0[m -> [32m271[m bytes
 .../browser/default/images/icons/32/xml.gif        |  Bin [31m0[m -> [32m408[m bytes
 .../browser/default/images/icons/32/zip.gif        |  Bin [31m0[m -> [32m368[m bytes
 .../browser/default/images/icons/ai.gif            |  Bin [31m0[m -> [32m403[m bytes
 .../browser/default/images/icons/avi.gif           |  Bin [31m0[m -> [32m249[m bytes
 .../browser/default/images/icons/bmp.gif           |  Bin [31m0[m -> [32m126[m bytes
 .../browser/default/images/icons/cs.gif            |  Bin [31m0[m -> [32m128[m bytes
 .../browser/default/images/icons/default.icon.gif  |  Bin [31m0[m -> [32m113[m bytes
 .../browser/default/images/icons/dll.gif           |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/icons/doc.gif           |  Bin [31m0[m -> [32m140[m bytes
 .../browser/default/images/icons/exe.gif           |  Bin [31m0[m -> [32m109[m bytes
 .../browser/default/images/icons/fla.gif           |  Bin [31m0[m -> [32m382[m bytes
 .../browser/default/images/icons/gif.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/htm.gif           |  Bin [31m0[m -> [32m621[m bytes
 .../browser/default/images/icons/html.gif          |  Bin [31m0[m -> [32m621[m bytes
 .../browser/default/images/icons/jpg.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/js.gif            |  Bin [31m0[m -> [32m139[m bytes
 .../browser/default/images/icons/mdb.gif           |  Bin [31m0[m -> [32m146[m bytes
 .../browser/default/images/icons/mp3.gif           |  Bin [31m0[m -> [32m249[m bytes
 .../browser/default/images/icons/pdf.gif           |  Bin [31m0[m -> [32m230[m bytes
 .../browser/default/images/icons/png.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/ppt.gif           |  Bin [31m0[m -> [32m139[m bytes
 .../browser/default/images/icons/rdp.gif           |  Bin [31m0[m -> [32m606[m bytes
 .../browser/default/images/icons/swf.gif           |  Bin [31m0[m -> [32m388[m bytes
 .../browser/default/images/icons/swt.gif           |  Bin [31m0[m -> [32m388[m bytes
 .../browser/default/images/icons/txt.gif           |  Bin [31m0[m -> [32m122[m bytes
 .../browser/default/images/icons/vsd.gif           |  Bin [31m0[m -> [32m136[m bytes
 .../browser/default/images/icons/xls.gif           |  Bin [31m0[m -> [32m138[m bytes
 .../browser/default/images/icons/xml.gif           |  Bin [31m0[m -> [32m231[m bytes
 .../browser/default/images/icons/zip.gif           |  Bin [31m0[m -> [32m235[m bytes
 .../filemanager/browser/default/images/spacer.gif  |  Bin [31m0[m -> [32m43[m bytes
 .../filemanager/browser/default/js/common.js       |   88 [32m++[m
 .../filemanager/browser/default/js/fckxml.js       |  147 [32m++[m
 .../editor/filemanager/connectors/asp/basexml.asp  |   67 [32m+[m
 .../filemanager/connectors/asp/class_upload.asp    |  353 [32m+++++[m
 .../editor/filemanager/connectors/asp/commands.asp |  202 [32m+++[m
 .../editor/filemanager/connectors/asp/config.asp   |  128 [32m++[m
 .../filemanager/connectors/asp/connector.asp       |   88 [32m++[m
 .../editor/filemanager/connectors/asp/io.asp       |  247 [32m++++[m
 .../editor/filemanager/connectors/asp/upload.asp   |   65 [32m+[m
 .../editor/filemanager/connectors/asp/util.asp     |   55 [32m+[m
 .../editor/filemanager/connectors/aspx/config.ascx |   98 [32m++[m
 .../filemanager/connectors/aspx/connector.aspx     |   32 [32m+[m
 .../editor/filemanager/connectors/aspx/upload.aspx |   32 [32m+[m
 .../filemanager/connectors/cfm/ImageObject.cfc     |  273 [32m++++[m
 .../filemanager/connectors/cfm/cf5_connector.cfm   |  330 [32m+++++[m
 .../filemanager/connectors/cfm/cf5_upload.cfm      |  309 [32m++++[m
 .../filemanager/connectors/cfm/cf_basexml.cfm      |   72 [32m+[m
 .../filemanager/connectors/cfm/cf_commands.cfm     |  230 [32m+++[m
 .../filemanager/connectors/cfm/cf_connector.cfm    |   89 [32m++[m
 .../editor/filemanager/connectors/cfm/cf_io.cfm    |  299 [32m++++[m
 .../filemanager/connectors/cfm/cf_upload.cfm       |   71 [32m+[m
 .../editor/filemanager/connectors/cfm/cf_util.cfm  |  131 [32m++[m
 .../editor/filemanager/connectors/cfm/config.cfm   |  188 [32m+++[m
 .../filemanager/connectors/cfm/connector.cfm       |   32 [32m+[m
 .../editor/filemanager/connectors/cfm/image.cfc    | 1324 [32m+++++++++++++++++[m
 .../editor/filemanager/connectors/cfm/upload.cfm   |   31 [32m+[m
 .../filemanager/connectors/lasso/config.lasso      |   65 [32m+[m
 .../filemanager/connectors/lasso/connector.lasso   |  330 [32m+++++[m
 .../filemanager/connectors/lasso/upload.lasso      |  178 [32m+++[m
 .../editor/filemanager/connectors/perl/basexml.pl  |   68 [32m+[m
 .../editor/filemanager/connectors/perl/commands.pl |  200 [32m+++[m
 .../editor/filemanager/connectors/perl/config.pl   |   39 [32m+[m
 .../filemanager/connectors/perl/connector.cgi      |  129 [32m++[m
 .../editor/filemanager/connectors/perl/io.pl       |  141 [32m++[m
 .../editor/filemanager/connectors/perl/upload.cgi  |   87 [32m++[m
 .../filemanager/connectors/perl/upload_fck.pl      |  686 [32m+++++++++[m
 .../editor/filemanager/connectors/perl/util.pl     |   66 [32m+[m
 .../editor/filemanager/connectors/php/basexml.php  |   99 [32m++[m
 .../editor/filemanager/connectors/php/commands.php |  280 [32m++++[m
 .../editor/filemanager/connectors/php/config.php   |  153 [32m++[m
 .../filemanager/connectors/php/connector.php       |   87 [32m++[m
 .../editor/filemanager/connectors/php/io.php       |  303 [32m++++[m
 .../filemanager/connectors/php/phpcompat.php       |   17 [32m+[m
 .../editor/filemanager/connectors/php/upload.php   |   59 [32m+[m
 .../editor/filemanager/connectors/php/util.php     |  220 [32m+++[m
 .../editor/filemanager/connectors/py/config.py     |  146 [32m++[m
 .../editor/filemanager/connectors/py/connector.py  |  121 [32m++[m
 .../filemanager/connectors/py/fckcommands.py       |  202 [32m+++[m
 .../filemanager/connectors/py/fckconnector.py      |   90 [32m++[m
 .../editor/filemanager/connectors/py/fckoutput.py  |  119 [32m++[m
 .../editor/filemanager/connectors/py/fckutil.py    |  130 [32m++[m
 .../editor/filemanager/connectors/py/htaccess.txt  |   23 [32m+[m
 .../editor/filemanager/connectors/py/upload.py     |   88 [32m++[m
 .../editor/filemanager/connectors/py/wsgi.py       |   58 [32m+[m
 .../editor/filemanager/connectors/py/zope.py       |  188 [32m+++[m
 .../editor/filemanager/connectors/test.html        |  210 [32m+++[m
 .../editor/filemanager/connectors/uploadtest.html  |  192 [32m+++[m
 easy/fckeditor/editor/images/anchor.gif            |  Bin [31m0[m -> [32m184[m bytes
 easy/fckeditor/editor/images/arrow_ltr.gif         |  Bin [31m0[m -> [32m49[m bytes
 easy/fckeditor/editor/images/arrow_rtl.gif         |  Bin [31m0[m -> [32m49[m bytes
 .../editor/images/smiley/msn/angel_smile.gif       |  Bin [31m0[m -> [32m445[m bytes
 .../editor/images/smiley/msn/angry_smile.gif       |  Bin [31m0[m -> [32m453[m bytes
 .../editor/images/smiley/msn/broken_heart.gif      |  Bin [31m0[m -> [32m423[m bytes
 easy/fckeditor/editor/images/smiley/msn/cake.gif   |  Bin [31m0[m -> [32m453[m bytes
 .../editor/images/smiley/msn/confused_smile.gif    |  Bin [31m0[m -> [32m322[m bytes
 .../editor/images/smiley/msn/cry_smile.gif         |  Bin [31m0[m -> [32m473[m bytes
 .../editor/images/smiley/msn/devil_smile.gif       |  Bin [31m0[m -> [32m444[m bytes
 .../editor/images/smiley/msn/embaressed_smile.gif  |  Bin [31m0[m -> [32m1077[m bytes
 .../editor/images/smiley/msn/envelope.gif          |  Bin [31m0[m -> [32m1030[m bytes
 easy/fckeditor/editor/images/smiley/msn/heart.gif  |  Bin [31m0[m -> [32m1012[m bytes
 easy/fckeditor/editor/images/smiley/msn/kiss.gif   |  Bin [31m0[m -> [32m978[m bytes
 .../editor/images/smiley/msn/lightbulb.gif         |  Bin [31m0[m -> [32m303[m bytes
 .../editor/images/smiley/msn/omg_smile.gif         |  Bin [31m0[m -> [32m342[m bytes
 .../editor/images/smiley/msn/regular_smile.gif     |  Bin [31m0[m -> [32m1036[m bytes
 .../editor/images/smiley/msn/sad_smile.gif         |  Bin [31m0[m -> [32m1039[m bytes
 .../editor/images/smiley/msn/shades_smile.gif      |  Bin [31m0[m -> [32m1059[m bytes
 .../editor/images/smiley/msn/teeth_smile.gif       |  Bin [31m0[m -> [32m1064[m bytes
 .../editor/images/smiley/msn/thumbs_down.gif       |  Bin [31m0[m -> [32m992[m bytes
 .../editor/images/smiley/msn/thumbs_up.gif         |  Bin [31m0[m -> [32m989[m bytes
 .../editor/images/smiley/msn/tounge_smile.gif      |  Bin [31m0[m -> [32m1055[m bytes
 .../smiley/msn/whatchutalkingabout_smile.gif       |  Bin [31m0[m -> [32m1034[m bytes
 .../editor/images/smiley/msn/wink_smile.gif        |  Bin [31m0[m -> [32m1041[m bytes
 easy/fckeditor/editor/images/spacer.gif            |  Bin [31m0[m -> [32m43[m bytes
 easy/fckeditor/editor/js/fckadobeair.js            |  176 [32m+++[m
 easy/fckeditor/editor/js/fckeditorcode_gecko.js    |  108 [32m++[m
 easy/fckeditor/editor/js/fckeditorcode_ie.js       |  109 [32m++[m
 easy/fckeditor/editor/lang/_translationstatus.txt  |   79 [32m++[m
 easy/fckeditor/editor/lang/af.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ar.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/bg.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/bn.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/bs.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ca.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/cs.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/da.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/de.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/el.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/en-au.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/en-ca.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/en-uk.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/en.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/eo.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/es.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/et.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/eu.js                   |  535 [32m+++++++[m
 easy/fckeditor/editor/lang/fa.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/fi.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/fo.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/fr-ca.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/fr.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/gl.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/gu.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/he.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/hi.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/hr.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/hu.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/is.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/it.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ja.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/km.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ko.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/lt.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/lv.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/mn.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ms.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/nb.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/nl.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/no.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/pl.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/pt-br.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/pt.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ro.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/ru.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/sk.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/sl.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/sr-latn.js              |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/sr.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/sv.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/th.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/tr.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/uk.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/vi.js                   |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/zh-cn.js                |  534 [32m+++++++[m
 easy/fckeditor/editor/lang/zh.js                   |  534 [32m+++++++[m
 .../fckeditor/editor/plugins/autogrow/fckplugin.js |  111 [32m++[m
 .../editor/plugins/bbcode/_sample/sample.config.js |   26 [32m+[m
 .../editor/plugins/bbcode/_sample/sample.html      |   67 [32m+[m
 easy/fckeditor/editor/plugins/bbcode/fckplugin.js  |  123 [32m++[m
 .../editor/plugins/dragresizetable/fckplugin.js    |  529 [32m+++++++[m
 .../plugins/placeholder/fck_placeholder.html       |  105 [32m++[m
 .../editor/plugins/placeholder/fckplugin.js        |  187 [32m+++[m
 .../editor/plugins/placeholder/lang/de.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/en.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/es.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/fr.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/it.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/pl.js          |   27 [32m+[m
 .../editor/plugins/placeholder/placeholder.gif     |  Bin [31m0[m -> [32m96[m bytes
 .../editor/plugins/simplecommands/fckplugin.js     |   29 [32m+[m
 .../editor/plugins/tablecommands/fckplugin.js      |   33 [32m+[m
 easy/fckeditor/editor/skins/_fckviewstrips.html    |  121 [32m++[m
 easy/fckeditor/editor/skins/default/fck_dialog.css |  402 [32m++++++[m
 .../editor/skins/default/fck_dialog_ie6.js         |  110 [32m++[m
 easy/fckeditor/editor/skins/default/fck_editor.css |  464 [32m++++++[m
 easy/fckeditor/editor/skins/default/fck_strip.gif  |  Bin [31m0[m -> [32m5175[m bytes
 .../editor/skins/default/images/dialog.sides.gif   |  Bin [31m0[m -> [32m48[m bytes
 .../editor/skins/default/images/dialog.sides.png   |  Bin [31m0[m -> [32m178[m bytes
 .../skins/default/images/dialog.sides.rtl.png      |  Bin [31m0[m -> [32m181[m bytes
 .../editor/skins/default/images/sprites.gif        |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/default/images/sprites.png        |  Bin [31m0[m -> [32m3250[m bytes
 .../skins/default/images/toolbar.arrowright.gif    |  Bin [31m0[m -> [32m53[m bytes
 .../skins/default/images/toolbar.buttonarrow.gif   |  Bin [31m0[m -> [32m46[m bytes
 .../skins/default/images/toolbar.collapse.gif      |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/default/images/toolbar.end.gif    |  Bin [31m0[m -> [32m43[m bytes
 .../editor/skins/default/images/toolbar.expand.gif |  Bin [31m0[m -> [32m152[m bytes
 .../skins/default/images/toolbar.separator.gif     |  Bin [31m0[m -> [32m58[m bytes
 .../editor/skins/default/images/toolbar.start.gif  |  Bin [31m0[m -> [32m105[m bytes
 .../editor/skins/office2003/fck_dialog.css         |  402 [32m++++++[m
 .../editor/skins/office2003/fck_dialog_ie6.js      |  110 [32m++[m
 .../editor/skins/office2003/fck_editor.css         |  476 [32m+++++++[m
 .../editor/skins/office2003/fck_strip.gif          |  Bin [31m0[m -> [32m9668[m bytes
 .../skins/office2003/images/dialog.sides.gif       |  Bin [31m0[m -> [32m48[m bytes
 .../skins/office2003/images/dialog.sides.png       |  Bin [31m0[m -> [32m203[m bytes
 .../skins/office2003/images/dialog.sides.rtl.png   |  Bin [31m0[m -> [32m205[m bytes
 .../editor/skins/office2003/images/sprites.gif     |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/office2003/images/sprites.png     |  Bin [31m0[m -> [32m3305[m bytes
 .../skins/office2003/images/toolbar.arrowright.gif |  Bin [31m0[m -> [32m53[m bytes
 .../editor/skins/office2003/images/toolbar.bg.gif  |  Bin [31m0[m -> [32m73[m bytes
 .../office2003/images/toolbar.buttonarrow.gif      |  Bin [31m0[m -> [32m46[m bytes
 .../skins/office2003/images/toolbar.collapse.gif   |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/office2003/images/toolbar.end.gif |  Bin [31m0[m -> [32m124[m bytes
 .../skins/office2003/images/toolbar.expand.gif     |  Bin [31m0[m -> [32m152[m bytes
 .../skins/office2003/images/toolbar.separator.gif  |  Bin [31m0[m -> [32m67[m bytes
 .../skins/office2003/images/toolbar.start.gif      |  Bin [31m0[m -> [32m99[m bytes
 easy/fckeditor/editor/skins/silver/fck_dialog.css  |  402 [32m++++++[m
 .../editor/skins/silver/fck_dialog_ie6.js          |  110 [32m++[m
 easy/fckeditor/editor/skins/silver/fck_editor.css  |  473 [32m++++++[m
 easy/fckeditor/editor/skins/silver/fck_strip.gif   |  Bin [31m0[m -> [32m5175[m bytes
 .../editor/skins/silver/images/dialog.sides.gif    |  Bin [31m0[m -> [32m48[m bytes
 .../editor/skins/silver/images/dialog.sides.png    |  Bin [31m0[m -> [32m198[m bytes
 .../skins/silver/images/dialog.sides.rtl.png       |  Bin [31m0[m -> [32m200[m bytes
 .../editor/skins/silver/images/sprites.gif         |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/silver/images/sprites.png         |  Bin [31m0[m -> [32m3278[m bytes
 .../skins/silver/images/toolbar.arrowright.gif     |  Bin [31m0[m -> [32m53[m bytes
 .../skins/silver/images/toolbar.buttonarrow.gif    |  Bin [31m0[m -> [32m46[m bytes
 .../skins/silver/images/toolbar.buttonbg.gif       |  Bin [31m0[m -> [32m829[m bytes
 .../skins/silver/images/toolbar.collapse.gif       |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/silver/images/toolbar.end.gif     |  Bin [31m0[m -> [32m43[m bytes
 .../editor/skins/silver/images/toolbar.expand.gif  |  Bin [31m0[m -> [32m152[m bytes
 .../skins/silver/images/toolbar.separator.gif      |  Bin [31m0[m -> [32m58[m bytes
 .../editor/skins/silver/images/toolbar.start.gif   |  Bin [31m0[m -> [32m105[m bytes
 easy/fckeditor/editor/wsc/ciframe.html             |   65 [32m+[m
 easy/fckeditor/editor/wsc/tmpFrameset.html         |   67 [32m+[m
 easy/fckeditor/editor/wsc/w.html                   |  227 [32m+++[m
 easy/fckeditor/fckconfig.js                        |  325 [32m+++++[m
 easy/fckeditor/fckeditor.php                       |   31 [32m+[m
 easy/fckeditor/fckeditor_php4.php                  |  262 [32m++++[m
 easy/fckeditor/fckeditor_php5.php                  |  257 [32m++++[m
 easy/fckeditor/fckstyles.xml                       |  111 [32m++[m
 easy/fckeditor/fcktemplates.xml                    |  103 [32m++[m
 easy/galeries/Photo Gallery/pgzoom_1.jpg           |  Bin [31m0[m -> [32m82027[m bytes
 easy/galeries/Photo Gallery/pgzoom_13.jpg          |  Bin [31m0[m -> [32m58064[m bytes
 easy/galeries/Photo Gallery/pgzoom_5.jpg           |  Bin [31m0[m -> [32m115789[m bytes
 easy/galeries/index.html                           |    1 [32m+[m
 easy/gallery.php                                   |   71 [32m+[m
 easy/images/aaccept.png                            |  Bin [31m0[m -> [32m2164[m bytes
 easy/images/accept.png                             |  Bin [31m0[m -> [32m1295[m bytes
 easy/images/add.png                                |  Bin [31m0[m -> [32m3836[m bytes
 easy/images/addpage.png                            |  Bin [31m0[m -> [32m1969[m bytes
 easy/images/back.png                               |  Bin [31m0[m -> [32m1482[m bytes
 easy/images/blank.gif                              |  Bin [31m0[m -> [32m43[m bytes
 easy/images/building.jpg                           |  Bin [31m0[m -> [32m317969[m bytes
 easy/images/close_blue.png                         |  Bin [31m0[m -> [32m1788[m bytes
 easy/images/close_gold.png                         |  Bin [31m0[m -> [32m1652[m bytes
 easy/images/close_green.png                        |  Bin [31m0[m -> [32m1525[m bytes
 easy/images/close_grey.png                         |  Bin [31m0[m -> [32m1715[m bytes
 easy/images/close_red.png                          |  Bin [31m0[m -> [32m1525[m bytes
 easy/images/closelabel.gif                         |  Bin [31m0[m -> [32m979[m bytes
 easy/images/database.png                           |  Bin [31m0[m -> [32m3436[m bytes
 easy/images/edit.png                               |  Bin [31m0[m -> [32m676[m bytes
 easy/images/editdelete.png                         |  Bin [31m0[m -> [32m1000[m bytes
 easy/images/editdelete1.png                        |  Bin [31m0[m -> [32m865[m bytes
 easy/images/extra.png                              |  Bin [31m0[m -> [32m1327[m bytes
 easy/images/generate.png                           |  Bin [31m0[m -> [32m3761[m bytes
 easy/images/key.png                                |  Bin [31m0[m -> [32m3488[m bytes
 easy/images/loading.gif                            |  Bin [31m0[m -> [32m2767[m bytes
 easy/images/menu.png                               |  Bin [31m0[m -> [32m2278[m bytes
 easy/images/next_blue.gif                          |  Bin [31m0[m -> [32m733[m bytes
 easy/images/next_gold.gif                          |  Bin [31m0[m -> [32m732[m bytes
 easy/images/next_green.gif                         |  Bin [31m0[m -> [32m732[m bytes
 easy/images/next_grey.gif                          |  Bin [31m0[m -> [32m731[m bytes
 easy/images/next_red.gif                           |  Bin [31m0[m -> [32m732[m bytes
 easy/images/nextlabel.gif                          |  Bin [31m0[m -> [32m354[m bytes
 easy/images/pause_blue.png                         |  Bin [31m0[m -> [32m1357[m bytes
 easy/images/pause_gold.png                         |  Bin [31m0[m -> [32m1207[m bytes
 easy/images/pause_green.png                        |  Bin [31m0[m -> [32m1149[m bytes
 easy/images/pause_grey.png                         |  Bin [31m0[m -> [32m1282[m bytes
 easy/images/pause_red.png                          |  Bin [31m0[m -> [32m1133[m bytes
 easy/images/play_blue.png                          |  Bin [31m0[m -> [32m1231[m bytes
 easy/images/play_gold.png                          |  Bin [31m0[m -> [32m1141[m bytes
 easy/images/play_green.png                         |  Bin [31m0[m -> [32m1097[m bytes
 easy/images/play_grey.png                          |  Bin [31m0[m -> [32m1178[m bytes
 easy/images/play_red.png                           |  Bin [31m0[m -> [32m1079[m bytes
 easy/images/plugins.png                            |  Bin [31m0[m -> [32m2815[m bytes
 easy/images/prev_blue.gif                          |  Bin [31m0[m -> [32m748[m bytes
 easy/images/prev_gold.gif                          |  Bin [31m0[m -> [32m748[m bytes
 easy/images/prev_green.gif                         |  Bin [31m0[m -> [32m748[m bytes
 easy/images/prev_grey.gif                          |  Bin [31m0[m -> [32m748[m bytes
 easy/images/prev_red.gif                           |  Bin [31m0[m -> [32m748[m bytes
 easy/images/prevlabel.gif                          |  Bin [31m0[m -> [32m371[m bytes
 easy/images/rss.png                                |  Bin [31m0[m -> [32m594[m bytes
 easy/images/setup.png                              |  Bin [31m0[m -> [32m1446[m bytes
 easy/images/spacer.gif                             |  Bin [31m0[m -> [32m44[m bytes
 easy/images/tools.png                              |  Bin [31m0[m -> [32m1467[m bytes
 easy/images/toolss.png                             |  Bin [31m0[m -> [32m951[m bytes
 easy/images/user.png                               |  Bin [31m0[m -> [32m2395[m bytes
 easy/images/valid-css.png                          |  Bin [31m0[m -> [32m1298[m bytes
 easy/images/valid-xhtml10.png                      |  Bin [31m0[m -> [32m1363[m bytes
 easy/images/wyz.png                                |  Bin [31m0[m -> [32m917[m bytes
 easy/index.php                                     |   72 [32m+[m
 easy/js/dewplayer.swf                              |  Bin [31m0[m -> [32m4271[m bytes
 easy/js/dewplayer.txt                              |    1 [32m+[m
 easy/js/index.html                                 |    1 [32m+[m
 easy/js/lytebox.js                                 |  855 [32m+++++++++++[m
 easy/languages/lang_en_US.php                      |  162 [32m+++[m
 easy/main.php                                      |    4 [32m+[m
 easy/news.php                                      |   72 [32m+[m
 easy/plugins/forum/header.mod                      |    2 [32m+[m
 easy/plugins/forum/header.ori                      |    2 [32m+[m
 easy/plugins/forum/include.mod                     |  516 [32m+++++++[m
 easy/plugins/forum/lang/lang_en_US.php             |   35 [32m+[m
 easy/plugins/forum/layout/style.css                |  169 [32m+++[m
 easy/plugins/forum/settings.php                    |    7 [32m+[m
 easy/plugins/forum/setup.mod                       |   79 [32m++[m
 easy/plugins/forum/theme/blue.css                  |   73 [32m+[m
 easy/plugins/forum/theme/brown.css                 |   95 [32m++[m
 easy/plugins/forum/theme/green.css                 |   70 [32m+[m
 easy/plugins/index.html                            |    1 [32m+[m
 easy/sitemap.xml                                   |   98 [32m++[m
 easy/templates/admintemplate/images/lne.png        |  Bin [31m0[m -> [32m29844[m bytes
 easy/templates/admintemplate/images/topbg.png      |  Bin [31m0[m -> [32m388[m bytes
 easy/templates/admintemplate/style.css             |  375 [32m+++++[m
 easy/templates/admintemplate/template.php          |   43 [32m+[m
 easy/thumbs/pgzoom_1.jpg                           |  Bin [31m0[m -> [32m3470[m bytes
 easy/thumbs/pgzoom_13.jpg                          |  Bin [31m0[m -> [32m4483[m bytes
 easy/thumbs/pgzoom_5.jpg                           |  Bin [31m0[m -> [32m3875[m bytes
 easy/uploads/index.html                            |    1 [32m+[m
 keylogger/keylogger.py                             |   12 [32m+[m[31m-[m
 574 files changed, 88169 insertions(+), 6 deletions(-)

[33mcommit 167c5cc6a9e03ef3a4284318fcd8207705a67fbe[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Mon Jun 17 04:13:50 2013 -0500

    ckeditor added!

 ckeditor/CHANGES.md                                |  154 [32m+++[m
 ckeditor/LICENSE.md                                | 1264 [32m++++++++++++++++++++[m
 ckeditor/README.md                                 |   39 [32m+[m
 ckeditor/build-config.js                           |  140 [32m+++[m
 ckeditor/ckeditor.js                               |  853 [32m+++++++++++++[m
 ckeditor/config.js                                 |   38 [32m+[m
 ckeditor/contents.css                              |  103 [32m++[m
 ckeditor/lang/af.js                                |    5 [32m+[m
 ckeditor/lang/ar.js                                |    5 [32m+[m
 ckeditor/lang/bg.js                                |    5 [32m+[m
 ckeditor/lang/bn.js                                |    5 [32m+[m
 ckeditor/lang/bs.js                                |    5 [32m+[m
 ckeditor/lang/ca.js                                |    5 [32m+[m
 ckeditor/lang/cs.js                                |    5 [32m+[m
 ckeditor/lang/cy.js                                |    5 [32m+[m
 ckeditor/lang/da.js                                |    5 [32m+[m
 ckeditor/lang/de.js                                |    5 [32m+[m
 ckeditor/lang/el.js                                |    5 [32m+[m
 ckeditor/lang/en-au.js                             |    5 [32m+[m
 ckeditor/lang/en-ca.js                             |    5 [32m+[m
 ckeditor/lang/en-gb.js                             |    5 [32m+[m
 ckeditor/lang/en.js                                |    5 [32m+[m
 ckeditor/lang/eo.js                                |    5 [32m+[m
 ckeditor/lang/es.js                                |    5 [32m+[m
 ckeditor/lang/et.js                                |    5 [32m+[m
 ckeditor/lang/eu.js                                |    5 [32m+[m
 ckeditor/lang/fa.js                                |    5 [32m+[m
 ckeditor/lang/fi.js                                |    5 [32m+[m
 ckeditor/lang/fo.js                                |    5 [32m+[m
 ckeditor/lang/fr-ca.js                             |    5 [32m+[m
 ckeditor/lang/fr.js                                |    5 [32m+[m
 ckeditor/lang/gl.js                                |    5 [32m+[m
 ckeditor/lang/gu.js                                |    5 [32m+[m
 ckeditor/lang/he.js                                |    5 [32m+[m
 ckeditor/lang/hi.js                                |    5 [32m+[m
 ckeditor/lang/hr.js                                |    5 [32m+[m
 ckeditor/lang/hu.js                                |    5 [32m+[m
 ckeditor/lang/is.js                                |    5 [32m+[m
 ckeditor/lang/it.js                                |    5 [32m+[m
 ckeditor/lang/ja.js                                |    5 [32m+[m
 ckeditor/lang/ka.js                                |    5 [32m+[m
 ckeditor/lang/km.js                                |    5 [32m+[m
 ckeditor/lang/ko.js                                |    5 [32m+[m
 ckeditor/lang/ku.js                                |    5 [32m+[m
 ckeditor/lang/lt.js                                |    5 [32m+[m
 ckeditor/lang/lv.js                                |    5 [32m+[m
 ckeditor/lang/mk.js                                |    5 [32m+[m
 ckeditor/lang/mn.js                                |    5 [32m+[m
 ckeditor/lang/ms.js                                |    5 [32m+[m
 ckeditor/lang/nb.js                                |    5 [32m+[m
 ckeditor/lang/nl.js                                |    5 [32m+[m
 ckeditor/lang/no.js                                |    5 [32m+[m
 ckeditor/lang/pl.js                                |    5 [32m+[m
 ckeditor/lang/pt-br.js                             |    5 [32m+[m
 ckeditor/lang/pt.js                                |    5 [32m+[m
 ckeditor/lang/ro.js                                |    5 [32m+[m
 ckeditor/lang/ru.js                                |    5 [32m+[m
 ckeditor/lang/si.js                                |    5 [32m+[m
 ckeditor/lang/sk.js                                |    5 [32m+[m
 ckeditor/lang/sl.js                                |    5 [32m+[m
 ckeditor/lang/sq.js                                |    5 [32m+[m
 ckeditor/lang/sr-latn.js                           |    5 [32m+[m
 ckeditor/lang/sr.js                                |    5 [32m+[m
 ckeditor/lang/sv.js                                |    5 [32m+[m
 ckeditor/lang/th.js                                |    5 [32m+[m
 ckeditor/lang/tr.js                                |    5 [32m+[m
 ckeditor/lang/ug.js                                |    5 [32m+[m
 ckeditor/lang/uk.js                                |    5 [32m+[m
 ckeditor/lang/vi.js                                |    5 [32m+[m
 ckeditor/lang/zh-cn.js                             |    5 [32m+[m
 ckeditor/lang/zh.js                                |    5 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/a11yhelp.js      |   10 [32m+[m
 .../a11yhelp/dialogs/lang/_translationstatus.txt   |   25 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ar.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/bg.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ca.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/cs.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/cy.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/da.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/de.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/el.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/en.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/eo.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/es.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/et.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/fa.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/fi.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/fr-ca.js    |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/fr.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/gl.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/gu.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/he.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/hi.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/hr.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/hu.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/it.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ja.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/km.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ku.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/lt.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/lv.js       |   11 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/mk.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/mn.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/nb.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/nl.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/no.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/pl.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/pt-br.js    |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/pt.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ro.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ru.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/si.js       |    8 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/sk.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/sl.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/sq.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/sv.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/th.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/tr.js       |   10 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/ug.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/uk.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/vi.js       |    9 [32m+[m
 ckeditor/plugins/a11yhelp/dialogs/lang/zh-cn.js    |    7 [32m+[m
 ckeditor/plugins/about/dialogs/about.js            |    6 [32m+[m
 ckeditor/plugins/about/dialogs/logo_ckeditor.png   |  Bin [31m0[m -> [32m2759[m bytes
 ckeditor/plugins/clipboard/dialogs/paste.js        |   11 [32m+[m
 ckeditor/plugins/dialog/dialogDefinition.js        |    4 [32m+[m
 ckeditor/plugins/fakeobjects/images/spacer.gif     |  Bin [31m0[m -> [32m43[m bytes
 ckeditor/plugins/icons.png                         |  Bin [31m0[m -> [32m13474[m bytes
 ckeditor/plugins/image/dialogs/image.js            |   43 [32m+[m
 ckeditor/plugins/image/images/noimage.png          |  Bin [31m0[m -> [32m2115[m bytes
 ckeditor/plugins/link/dialogs/anchor.js            |    8 [32m+[m
 ckeditor/plugins/link/dialogs/link.js              |   36 [32m+[m
 ckeditor/plugins/link/images/anchor.png            |  Bin [31m0[m -> [32m566[m bytes
 ckeditor/plugins/magicline/images/icon.png         |  Bin [31m0[m -> [32m172[m bytes
 ckeditor/plugins/pastefromword/filter/default.js   |   31 [32m+[m
 ckeditor/plugins/scayt/LICENSE.md                  |   28 [32m+[m
 ckeditor/plugins/scayt/README.md                   |   25 [32m+[m
 ckeditor/plugins/scayt/dialogs/options.js          |   20 [32m+[m
 ckeditor/plugins/scayt/dialogs/toolbar.css         |   71 [32m++[m
 .../dialogs/lang/_translationstatus.txt            |   20 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/bg.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/ca.js    |   14 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/cs.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/cy.js    |   14 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/de.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/el.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/en.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/eo.js    |   12 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/es.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/et.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/fa.js    |   12 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/fi.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/fr-ca.js |   10 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/fr.js    |   11 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/gl.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/he.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/hr.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/hu.js    |   12 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/it.js    |   14 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/ku.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/lv.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/nb.js    |   11 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/nl.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/no.js    |   11 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/pl.js    |   12 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/pt-br.js |   11 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/ru.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/si.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/sk.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/sq.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/sv.js    |   11 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/th.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/tr.js    |   12 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/ug.js    |   13 [32m+[m
 ckeditor/plugins/specialchar/dialogs/lang/zh-cn.js |    9 [32m+[m
 .../plugins/specialchar/dialogs/specialchar.js     |   14 [32m+[m
 ckeditor/plugins/table/dialogs/table.js            |   21 [32m+[m
 ckeditor/plugins/tabletools/dialogs/tableCell.js   |   16 [32m+[m
 ckeditor/plugins/wsc/LICENSE.md                    |   28 [32m+[m
 ckeditor/plugins/wsc/README.md                     |   25 [32m+[m
 ckeditor/plugins/wsc/dialogs/ciframe.html          |   66 [32m+[m
 ckeditor/plugins/wsc/dialogs/tmp.html              |  127 [32m++[m
 ckeditor/plugins/wsc/dialogs/tmpFrameset.html      |   52 [32m+[m
 ckeditor/plugins/wsc/dialogs/wsc.css               |   82 [32m++[m
 ckeditor/plugins/wsc/dialogs/wsc.js                |   64 [32m+[m
 ckeditor/plugins/wsc/dialogs/wsc_ie.js             |   11 [32m+[m
 ckeditor/samples/ajax.html                         |   82 [32m++[m
 ckeditor/samples/api.html                          |  207 [32m++++[m
 ckeditor/samples/appendto.html                     |   57 [32m+[m
 ckeditor/samples/assets/inlineall/logo.png         |  Bin [31m0[m -> [32m4411[m bytes
 .../samples/assets/outputxhtml/outputxhtml.css     |  204 [32m++++[m
 ckeditor/samples/assets/posteddata.php             |   59 [32m+[m
 ckeditor/samples/assets/sample.css                 |    3 [32m+[m
 ckeditor/samples/assets/sample.jpg                 |  Bin [31m0[m -> [32m17932[m bytes
 ckeditor/samples/assets/uilanguages/languages.js   |    7 [32m+[m
 ckeditor/samples/datafiltering.html                |  401 [32m+++++++[m
 ckeditor/samples/divreplace.html                   |  141 [32m+++[m
 ckeditor/samples/index.html                        |  122 [32m++[m
 ckeditor/samples/inlineall.html                    |  311 [32m+++++[m
 ckeditor/samples/inlinebycode.html                 |  122 [32m++[m
 .../samples/plugins/dialog/assets/my_dialog.js     |   48 [32m+[m
 ckeditor/samples/plugins/dialog/dialog.html        |  187 [32m+++[m
 ckeditor/samples/plugins/enterkey/enterkey.html    |  103 [32m++[m
 .../assets/outputforflash/outputforflash.fla       |  Bin [31m0[m -> [32m85504[m bytes
 .../assets/outputforflash/outputforflash.swf       |  Bin [31m0[m -> [32m15571[m bytes
 .../htmlwriter/assets/outputforflash/swfobject.js  |   18 [32m+[m
 .../samples/plugins/htmlwriter/outputforflash.html |  280 [32m+++++[m
 .../samples/plugins/htmlwriter/outputhtml.html     |  221 [32m++++[m
 ckeditor/samples/plugins/magicline/magicline.html  |  207 [32m++++[m
 ckeditor/samples/plugins/toolbar/toolbar.html      |  232 [32m++++[m
 ckeditor/samples/plugins/wysiwygarea/fullpage.html |   77 [32m++[m
 ckeditor/samples/readonly.html                     |   73 [32m++[m
 ckeditor/samples/replacebyclass.html               |   57 [32m+[m
 ckeditor/samples/replacebycode.html                |   56 [32m+[m
 ckeditor/samples/sample.css                        |  339 [32m++++++[m
 ckeditor/samples/sample.js                         |   33 [32m+[m
 ckeditor/samples/sample_posteddata.php             |   16 [32m+[m
 ckeditor/samples/tabindex.html                     |   75 [32m++[m
 ckeditor/samples/uicolor.html                      |   69 [32m++[m
 ckeditor/samples/uilanguages.html                  |  119 [32m++[m
 ckeditor/samples/xhtmlstyle.html                   |  231 [32m++++[m
 ckeditor/skins/moono/dialog.css                    |    5 [32m+[m
 ckeditor/skins/moono/dialog_ie.css                 |    5 [32m+[m
 ckeditor/skins/moono/dialog_ie7.css                |    5 [32m+[m
 ckeditor/skins/moono/dialog_ie8.css                |    5 [32m+[m
 ckeditor/skins/moono/dialog_iequirks.css           |    5 [32m+[m
 ckeditor/skins/moono/dialog_opera.css              |    5 [32m+[m
 ckeditor/skins/moono/editor.css                    |    5 [32m+[m
 ckeditor/skins/moono/editor_gecko.css              |    5 [32m+[m
 ckeditor/skins/moono/editor_ie.css                 |    5 [32m+[m
 ckeditor/skins/moono/editor_ie7.css                |    5 [32m+[m
 ckeditor/skins/moono/editor_ie8.css                |    5 [32m+[m
 ckeditor/skins/moono/editor_iequirks.css           |    5 [32m+[m
 ckeditor/skins/moono/icons.png                     |  Bin [31m0[m -> [32m13474[m bytes
 ckeditor/skins/moono/images/arrow.png              |  Bin [31m0[m -> [32m261[m bytes
 ckeditor/skins/moono/images/close.png              |  Bin [31m0[m -> [32m389[m bytes
 ckeditor/skins/moono/images/mini.png               |  Bin [31m0[m -> [32m818[m bytes
 ckeditor/skins/moono/readme.md                     |   51 [32m+[m
 ckeditor/styles.js                                 |  111 [32m++[m
 239 files changed, 9028 insertions(+)

[33mcommit 801ed8476c7b4e608ad0622ff1f35efea52f356d[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Mon Jun 17 03:42:30 2013 -0500

    Keylogger added!

 keylogger/keylog-cli.exe | Bin [31m0[m -> [32m5999840[m bytes
 keylogger/keylogger.py   | 271 [32m+++++++++++++++++++++++++++++++++++++++++++++++[m
 2 files changed, 271 insertions(+)

[33mcommit 65bef592cf0c80ef4d9e05d8a2739e298b7e63cf[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Mon Jun 17 03:20:47 2013 -0500

    hamronepal added~

 hamronepal/Contactus.php                           | 119 [32m++++++[m
 hamronepal/FAQ.php                                 | 290 [32m+++++++++++++++[m
 hamronepal/Festival.php                            |  66 [32m++++[m
 hamronepal/Gallery.php                             |  66 [32m++++[m
 hamronepal/adminsir/adminmain.php                  |  54 [32m+++[m
 hamronepal/adminsir/category.php                   | 118 [32m++++++[m
 hamronepal/adminsir/css/style.css                  | 405 [32m+++++++++++++++++++++[m
 hamronepal/adminsir/edit category.php              | 132 [32m+++++++[m
 hamronepal/adminsir/images/Thumbs.db               | Bin [31m0[m -> [32m258560[m bytes
 hamronepal/adminsir/images/asc.gif                 | Bin [31m0[m -> [32m59[m bytes
 hamronepal/adminsir/images/del_icon.gif            | Bin [31m0[m -> [32m533[m bytes
 hamronepal/adminsir/images/desc.gif                | Bin [31m0[m -> [32m59[m bytes
 hamronepal/adminsir/images/edit_icon.gif           | Bin [31m0[m -> [32m208[m bytes
 hamronepal/adminsir/images/icon_view_detail.gif    | Bin [31m0[m -> [32m974[m bytes
 hamronepal/adminsir/images/live.gif                | Bin [31m0[m -> [32m130[m bytes
 hamronepal/adminsir/images/menu_bottom.gif         | Bin [31m0[m -> [32m134[m bytes
 hamronepal/adminsir/images/menu_top.gif            | Bin [31m0[m -> [32m135[m bytes
 hamronepal/adminsir/images/next_icon.gif           | Bin [31m0[m -> [32m1088[m bytes
 hamronepal/adminsir/images/prev_icon.gif           | Bin [31m0[m -> [32m1126[m bytes
 hamronepal/adminsir/images/spacer.gif              | Bin [31m0[m -> [32m53[m bytes
 hamronepal/adminsir/include/db_connection.php      |   4 [32m+[m
 hamronepal/adminsir/include/footer.php             |  14 [32m+[m
 hamronepal/adminsir/include/header.php             |  11 [32m+[m
 hamronepal/adminsir/include/leftmenu.php           |  24 [32m++[m
 hamronepal/adminsir/include/session.php            |   9 [32m+[m
 hamronepal/adminsir/index.php                      |  59 [32m+++[m
 hamronepal/css/styles.css                          |  38 [32m++[m
 hamronepal/header.php                              |  47 [32m+++[m
 hamronepal/history.php                             |  66 [32m++++[m
 hamronepal/images/084.BMP                          | Bin [31m0[m -> [32m308278[m bytes
 hamronepal/images/12453.jpg                        | Bin [31m0[m -> [32m199987[m bytes
 hamronepal/images/12462.jpg                        | Bin [31m0[m -> [32m160159[m bytes
 hamronepal/images/14agfa.jpg                       | Bin [31m0[m -> [32m92904[m bytes
 .../images/154759_395827807170562_473819160_n.jpg  | Bin [31m0[m -> [32m43009[m bytes
 hamronepal/images/24186.jpg                        | Bin [31m0[m -> [32m114961[m bytes
 ...9791499674_100002499607926_133489_3351733_o.jpg | Bin [31m0[m -> [32m65886[m bytes
 hamronepal/images/30266966.jpg                     | Bin [31m0[m -> [32m155127[m bytes
 .../images/392756_217061385048288_2121207599_n.jpg | Bin [31m0[m -> [32m30894[m bytes
 hamronepal/images/4.jpg                            | Bin [31m0[m -> [32m4817[m bytes
 .../images/533498_395810367164622_1852061621_n.jpg | Bin [31m0[m -> [32m15238[m bytes
 hamronepal/images/6.jpg                            | Bin [31m0[m -> [32m5105[m bytes
 hamronepal/images/65435.jpg                        | Bin [31m0[m -> [32m1248182[m bytes
 hamronepal/images/Twitter.png                      | Bin [31m0[m -> [32m24546[m bytes
 hamronepal/images/Untitled-1.png                   | Bin [31m0[m -> [32m21230[m bytes
 hamronepal/images/ant.jpg                          | Bin [31m0[m -> [32m30779[m bytes
 hamronepal/images/bike.jpg                         | Bin [31m0[m -> [32m67186[m bytes
 hamronepal/images/boy.jpg                          | Bin [31m0[m -> [32m29317[m bytes
 hamronepal/images/facebook.jpg                     | Bin [31m0[m -> [32m4624[m bytes
 hamronepal/images/flag.gif                         | Bin [31m0[m -> [32m12666[m bytes
 hamronepal/images/header_01.png                    | Bin [31m0[m -> [32m1422[m bytes
 hamronepal/images/header_02.png                    | Bin [31m0[m -> [32m8572[m bytes
 hamronepal/images/header_03.png                    | Bin [31m0[m -> [32m1421[m bytes
 hamronepal/images/header_04.png                    | Bin [31m0[m -> [32m1431[m bytes
 hamronepal/images/header_05.png                    | Bin [31m0[m -> [32m5306[m bytes
 hamronepal/images/header_06.png                    | Bin [31m0[m -> [32m1446[m bytes
 hamronepal/images/header_07.png                    | Bin [31m0[m -> [32m1631[m bytes
 hamronepal/images/images.jpg                       | Bin [31m0[m -> [32m4493[m bytes
 hamronepal/images/logo_facebook.png                | Bin [31m0[m -> [32m443158[m bytes
 hamronepal/images/logosend.jpg                     | Bin [31m0[m -> [32m6359[m bytes
 hamronepal/images/nepalmapsmall.jpg                | Bin [31m0[m -> [32m10644[m bytes
 hamronepal/images/pic.jpg                          | Bin [31m0[m -> [32m43707[m bytes
 hamronepal/include/body.php                        |  59 [32m+++[m
 hamronepal/include/footer.php                      |  21 [32m++[m
 hamronepal/include/header.html                     |   9 [32m+[m
 hamronepal/include/header.php                      |   9 [32m+[m
 hamronepal/include/images/Untitled-1.png           | Bin [31m0[m -> [32m21230[m bytes
 hamronepal/include/login.html                      |  84 [32m+++++[m
 hamronepal/index.php                               |  66 [32m++++[m
 68 files changed, 1770 insertions(+)

[33mcommit 58ee2c6d85380137d25795604379d95c57801b5c[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Mon Jun 17 04:16:25 2013 -0400

    Update README.md

 README.md | 2 [32m+[m[31m-[m
 1 file changed, 1 insertion(+), 1 deletion(-)

[33mcommit 6782edd27ebe1415035a145d0416717c55b62800[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Mon Jun 17 03:12:29 2013 -0500

    New files added~

 develop/LightNEasy.php                             |   16 [32m+[m
 develop/LightNEasy/admin.php                       |  974 [32m+++++++++++++[m
 develop/LightNEasy/atom.php                        |   87 [32m++[m
 develop/LightNEasy/common.php                      |  893 [32m++++++++++++[m
 develop/LightNEasy/index.html                      |    6 [32m+[m
 develop/LightNEasy/lastnews.php                    |   27 [32m+[m
 develop/LightNEasy/lightneasy.php                  |  422 [32m++++++[m
 develop/LightNEasy/rss.php                         |   50 [32m+[m
 develop/LightNEasy/runtime.php                     |  165 [32m+++[m
 develop/addons/contact/contact.css                 |   33 [32m+[m
 develop/addons/contact/header.php                  |   15 [32m+[m
 develop/addons/contact/lang/lang_en_US.php         |   26 [32m+[m
 develop/addons/contact/main.php                    |  135 [32m++[m
 develop/addons/downloads/admin.php                 |  166 [32m+++[m
 develop/addons/downloads/icon.png                  |  Bin [31m0[m -> [32m3881[m bytes
 develop/addons/downloads/lang/lang_en_US.php       |   33 [32m+[m
 develop/addons/downloads/main.php                  |   51 [32m+[m
 develop/addons/downloads/send.php                  |   81 [32m++[m
 develop/addons/dropdown/admin.php                  |   50 [32m+[m
 develop/addons/dropdown/colors.php                 |    6 [32m+[m
 develop/addons/dropdown/dropdown.css               |   83 [32m++[m
 develop/addons/dropdown/header.php                 |   15 [32m+[m
 develop/addons/dropdown/icon.png                   |  Bin [31m0[m -> [32m2527[m bytes
 develop/addons/dropdown/main.php                   |   50 [32m+[m
 develop/addons/dropdown/original.css               |   25 [32m+[m
 develop/addons/gallery/admin.php                   |  219 [32m+++[m
 develop/addons/gallery/common.php                  |   57 [32m+[m
 develop/addons/gallery/header.php                  |   15 [32m+[m
 develop/addons/gallery/icon.png                    |  Bin [31m0[m -> [32m3315[m bytes
 develop/addons/gallery/lang/lang_en_US.php         |   44 [32m+[m
 develop/addons/gallery/main.php                    |   77 [32m+[m
 develop/addons/gallery/settings.php                |    4 [32m+[m
 develop/addons/lang_en_US.php                      |   21 [32m+[m
 develop/addons/lastnews/header.php                 |   15 [32m+[m
 develop/addons/lastnews/main.php                   |   30 [32m+[m
 develop/addons/lastnews/news.css                   |   89 [32m++[m
 develop/addons/links/admin.php                     |  140 [32m++[m
 develop/addons/links/icon.png                      |  Bin [31m0[m -> [32m3860[m bytes
 develop/addons/links/lang/lang_en_US.php           |   30 [32m+[m
 develop/addons/links/main.php                      |   43 [32m+[m
 develop/addons/lyteframe/header.php                |   15 [32m+[m
 develop/addons/lyteframe/main.php                  |   29 [32m+[m
 develop/addons/mp3/dewplayer.swf                   |  Bin [31m0[m -> [32m4271[m bytes
 develop/addons/mp3/main.php                        |   22 [32m+[m
 develop/addons/news/admin.php                      |  186 [32m+++[m
 develop/addons/news/header.php                     |   15 [32m+[m
 develop/addons/news/icon.png                       |  Bin [31m0[m -> [32m2052[m bytes
 develop/addons/news/lang/lang_en_US.php            |   54 [32m+[m
 develop/addons/news/main.php                       |  220 [32m+++[m
 develop/addons/news/news.css                       |  102 [32m++[m
 develop/addons/survey/admin.php                    |  116 [32m++[m
 develop/addons/survey/css/style.css                |    0
 develop/addons/survey/header.php                   |   15 [32m+[m
 develop/addons/survey/icon.png                     |  Bin [31m0[m -> [32m2569[m bytes
 develop/addons/survey/lang/lang_en_US.php          |   18 [32m+[m
 develop/addons/survey/main.php                     |  106 [32m++[m
 develop/addons/survey/settings.php                 |    3 [32m+[m
 develop/addons/uploads/admin.php                   |   99 [32m++[m
 develop/addons/uploads/icon.png                    |  Bin [31m0[m -> [32m36310[m bytes
 develop/addons/uploads/lang/lang_en_US.php         |   37 [32m+[m
 develop/addons/uploads/main.php                    |  104 [32m++[m
 develop/addons/uploads/settings.php                |    4 [32m+[m
 develop/addons/videog/main.php                     |   20 [32m+[m
 develop/addons/videoy/main.php                     |   23 [32m+[m
 develop/addons/wrapper/header.php                  |   17 [32m+[m
 develop/addons/wrapper/main.php                    |   24 [32m+[m
 develop/addons/wrapper/novo                        |   34 [32m+[m
 develop/css/lightneasy.css                         |  266 [32m++++[m
 develop/css/lytebox.css                            |   93 [32m++[m
 develop/data/database.php                          |    8 [32m+[m
 develop/data/index.html                            |    1 [32m+[m
 develop/downloads/index.html                       |    1 [32m+[m
 .../editor/_source/classes/fckcontextmenu.js       |  223 [32m+++[m
 .../editor/_source/classes/fckdataprocessor.js     |  119 [32m++[m
 .../_source/classes/fckdocumentfragment_gecko.js   |   53 [32m+[m
 .../_source/classes/fckdocumentfragment_ie.js      |   58 [32m+[m
 .../editor/_source/classes/fckdomrange.js          |  935 [32m++++++++++++[m
 .../editor/_source/classes/fckdomrange_gecko.js    |  104 [32m++[m
 .../editor/_source/classes/fckdomrange_ie.js       |  199 [32m+++[m
 .../editor/_source/classes/fckdomrangeiterator.js  |  327 [32m+++++[m
 .../editor/_source/classes/fckeditingarea.js       |  368 [32m+++++[m
 .../editor/_source/classes/fckelementpath.js       |   89 [32m++[m
 .../editor/_source/classes/fckenterkey.js          |  708 [32m+++++++++[m
 .../fckeditor/editor/_source/classes/fckevents.js  |   71 [32m+[m
 .../editor/_source/classes/fckhtmliterator.js      |  142 [32m++[m
 .../fckeditor/editor/_source/classes/fckicon.js    |  103 [32m++[m
 .../editor/_source/classes/fckiecleanup.js         |   68 [32m+[m
 .../editor/_source/classes/fckimagepreloader.js    |   64 [32m+[m
 .../editor/_source/classes/fckkeystrokehandler.js  |  141 [32m++[m
 .../editor/_source/classes/fckmenublock.js         |  153 [32m++[m
 .../editor/_source/classes/fckmenublockpanel.js    |   54 [32m+[m
 .../editor/_source/classes/fckmenuitem.js          |  161 [32m+++[m
 .../fckeditor/editor/_source/classes/fckpanel.js   |  463 [32m++++++[m
 .../fckeditor/editor/_source/classes/fckplugin.js  |   56 [32m+[m
 .../editor/_source/classes/fckspecialcombo.js      |  376 [32m+++++[m
 .../fckeditor/editor/_source/classes/fckstyle.js   | 1500 [32m++++++++++++++++++++[m
 .../fckeditor/editor/_source/classes/fcktoolbar.js |  103 [32m++[m
 .../_source/classes/fcktoolbarbreak_gecko.js       |   36 [32m+[m
 .../editor/_source/classes/fcktoolbarbreak_ie.js   |   38 [32m+[m
 .../editor/_source/classes/fcktoolbarbutton.js     |   81 [32m++[m
 .../editor/_source/classes/fcktoolbarbuttonui.js   |  198 [32m+++[m
 .../_source/classes/fcktoolbarfontformatcombo.js   |  139 [32m++[m
 .../editor/_source/classes/fcktoolbarfontscombo.js |   98 [32m++[m
 .../_source/classes/fcktoolbarfontsizecombo.js     |   76 [32m+[m
 .../_source/classes/fcktoolbarpanelbutton.js       |  103 [32m++[m
 .../_source/classes/fcktoolbarspecialcombo.js      |  146 [32m++[m
 .../editor/_source/classes/fcktoolbarstylecombo.js |  200 [32m+++[m
 .../editor/_source/classes/fckw3crange.js          |  451 [32m++++++[m
 develop/fckeditor/editor/_source/classes/fckxml.js |  108 [32m++[m
 .../editor/_source/classes/fckxml_gecko.js         |  106 [32m++[m
 .../fckeditor/editor/_source/classes/fckxml_ie.js  |   93 [32m++[m
 .../_source/commandclasses/fck_othercommands.js    |  634 [32m+++++++++[m
 .../_source/commandclasses/fckblockquotecommand.js |  281 [32m++++[m
 .../_source/commandclasses/fckcorestylecommand.js  |   61 [32m+[m
 .../editor/_source/commandclasses/fckfitwindow.js  |  213 [32m+++[m
 .../_source/commandclasses/fckindentcommands.js    |  282 [32m++++[m
 .../_source/commandclasses/fckjustifycommands.js   |  173 [32m+++[m
 .../_source/commandclasses/fcklistcommands.js      |  382 [32m+++++[m
 .../_source/commandclasses/fcknamedcommand.js      |   39 [32m+[m
 .../commandclasses/fckpasteplaintextcommand.js     |   40 [32m+[m
 .../_source/commandclasses/fckpastewordcommand.js  |   40 [32m+[m
 .../commandclasses/fckremoveformatcommand.js       |   45 [32m+[m
 .../editor/_source/commandclasses/fckshowblocks.js |   94 [32m++[m
 .../commandclasses/fckspellcheckcommand_gecko.js   |   49 [32m+[m
 .../commandclasses/fckspellcheckcommand_ie.js      |   72 [32m+[m
 .../_source/commandclasses/fckstylecommand.js      |   60 [32m+[m
 .../_source/commandclasses/fcktablecommand.js      |  106 [32m++[m
 .../_source/commandclasses/fcktextcolorcommand.js  |  201 [32m+++[m
 develop/fckeditor/editor/_source/fckconstants.js   |   56 [32m+[m
 develop/fckeditor/editor/_source/fckeditorapi.js   |  179 [32m+++[m
 .../editor/_source/fckjscoreextensions.js          |  159 [32m+++[m
 .../fckeditor/editor/_source/fckscriptloader.js    |  122 [32m++[m
 develop/fckeditor/editor/_source/internals/fck.js  | 1256 [32m++++++++++++++++[m
 .../editor/_source/internals/fck_contextmenu.js    |  345 [32m+++++[m
 .../editor/_source/internals/fck_gecko.js          |  497 [32m+++++++[m
 .../fckeditor/editor/_source/internals/fck_ie.js   |  456 [32m++++++[m
 .../editor/_source/internals/fckbrowserinfo.js     |   61 [32m+[m
 .../editor/_source/internals/fckcodeformatter.js   |  100 [32m++[m
 .../editor/_source/internals/fckcommands.js        |  172 [32m+++[m
 .../editor/_source/internals/fckconfig.js          |  237 [32m++++[m
 .../fckeditor/editor/_source/internals/fckdebug.js |   59 [32m+[m
 .../editor/_source/internals/fckdebug_empty.js     |   31 [32m+[m
 .../editor/_source/internals/fckdialog.js          |  239 [32m++++[m
 .../_source/internals/fckdocumentprocessor.js      |  270 [32m++++[m
 .../editor/_source/internals/fckdomtools.js        | 1057 [32m++++++++++++++[m
 .../editor/_source/internals/fcklanguagemanager.js |  165 [32m+++[m
 .../editor/_source/internals/fcklisthandler.js     |  152 [32m++[m
 .../editor/_source/internals/fcklistslib.js        |   63 [32m+[m
 .../editor/_source/internals/fckplugins.js         |   46 [32m+[m
 .../editor/_source/internals/fckregexlib.js        |  100 [32m++[m
 .../editor/_source/internals/fckselection.js       |   42 [32m+[m
 .../editor/_source/internals/fckselection_gecko.js |  228 [32m+++[m
 .../editor/_source/internals/fckselection_ie.js    |  287 [32m++++[m
 .../editor/_source/internals/fckstyles.js          |  381 [32m+++++[m
 .../editor/_source/internals/fcktablehandler.js    |  863 [32m+++++++++++[m
 .../_source/internals/fcktablehandler_gecko.js     |   56 [32m+[m
 .../editor/_source/internals/fcktablehandler_ie.js |   64 [32m+[m
 .../editor/_source/internals/fcktoolbaritems.js    |  124 [32m++[m
 .../editor/_source/internals/fcktoolbarset.js      |  399 [32m++++++[m
 .../fckeditor/editor/_source/internals/fcktools.js |  749 [32m++++++++++[m
 .../editor/_source/internals/fcktools_gecko.js     |  282 [32m++++[m
 .../editor/_source/internals/fcktools_ie.js        |  234 [32m+++[m
 .../fckeditor/editor/_source/internals/fckundo.js  |  223 [32m+++[m
 .../editor/_source/internals/fckurlparams.js       |   39 [32m+[m
 .../fckeditor/editor/_source/internals/fckxhtml.js |  534 [32m+++++++[m
 .../editor/_source/internals/fckxhtml_gecko.js     |  114 [32m++[m
 .../editor/_source/internals/fckxhtml_ie.js        |  213 [32m+++[m
 .../editor/_source/internals/fckxhtmlentities.js   |  357 [32m+++++[m
 .../editor/css/behaviors/disablehandles.htc        |   15 [32m+[m
 .../editor/css/behaviors/showtableborders.htc      |   36 [32m+[m
 develop/fckeditor/editor/css/fck_editorarea.css    |  110 [32m++[m
 develop/fckeditor/editor/css/fck_internal.css      |  199 [32m+++[m
 .../editor/css/fck_showtableborders_gecko.css      |   49 [32m+[m
 .../fckeditor/editor/css/images/block_address.png  |  Bin [31m0[m -> [32m288[m bytes
 .../editor/css/images/block_blockquote.png         |  Bin [31m0[m -> [32m293[m bytes
 develop/fckeditor/editor/css/images/block_div.png  |  Bin [31m0[m -> [32m229[m bytes
 develop/fckeditor/editor/css/images/block_h1.png   |  Bin [31m0[m -> [32m218[m bytes
 develop/fckeditor/editor/css/images/block_h2.png   |  Bin [31m0[m -> [32m220[m bytes
 develop/fckeditor/editor/css/images/block_h3.png   |  Bin [31m0[m -> [32m219[m bytes
 develop/fckeditor/editor/css/images/block_h4.png   |  Bin [31m0[m -> [32m229[m bytes
 develop/fckeditor/editor/css/images/block_h5.png   |  Bin [31m0[m -> [32m236[m bytes
 develop/fckeditor/editor/css/images/block_h6.png   |  Bin [31m0[m -> [32m216[m bytes
 develop/fckeditor/editor/css/images/block_p.png    |  Bin [31m0[m -> [32m205[m bytes
 develop/fckeditor/editor/css/images/block_pre.png  |  Bin [31m0[m -> [32m223[m bytes
 develop/fckeditor/editor/css/images/fck_anchor.gif |  Bin [31m0[m -> [32m184[m bytes
 .../fckeditor/editor/css/images/fck_flashlogo.gif  |  Bin [31m0[m -> [32m599[m bytes
 .../editor/css/images/fck_hiddenfield.gif          |  Bin [31m0[m -> [32m105[m bytes
 .../fckeditor/editor/css/images/fck_pagebreak.gif  |  Bin [31m0[m -> [32m54[m bytes
 develop/fckeditor/editor/css/images/fck_plugin.gif |  Bin [31m0[m -> [32m1709[m bytes
 .../editor/dialog/common/fck_dialog_common.css     |   85 [32m++[m
 .../editor/dialog/common/fck_dialog_common.js      |  347 [32m+++++[m
 .../editor/dialog/common/images/locked.gif         |  Bin [31m0[m -> [32m74[m bytes
 .../editor/dialog/common/images/reset.gif          |  Bin [31m0[m -> [32m104[m bytes
 .../editor/dialog/common/images/unlocked.gif       |  Bin [31m0[m -> [32m75[m bytes
 develop/fckeditor/editor/dialog/fck_about.html     |  161 [32m+++[m
 .../editor/dialog/fck_about/logo_fckeditor.gif     |  Bin [31m0[m -> [32m2044[m bytes
 .../editor/dialog/fck_about/logo_fredck.gif        |  Bin [31m0[m -> [32m920[m bytes
 .../dialog/fck_about/sponsors/spellchecker_net.gif |  Bin [31m0[m -> [32m1447[m bytes
 develop/fckeditor/editor/dialog/fck_anchor.html    |  220 [32m+++[m
 develop/fckeditor/editor/dialog/fck_button.html    |  104 [32m++[m
 develop/fckeditor/editor/dialog/fck_checkbox.html  |  104 [32m++[m
 .../fckeditor/editor/dialog/fck_colorselector.html |  172 [32m+++[m
 develop/fckeditor/editor/dialog/fck_div.html       |  396 [32m++++++[m
 develop/fckeditor/editor/dialog/fck_docprops.html  |  600 [32m++++++++[m
 .../dialog/fck_docprops/fck_document_preview.html  |  113 [32m++[m
 develop/fckeditor/editor/dialog/fck_flash.html     |  152 [32m++[m
 .../fckeditor/editor/dialog/fck_flash/fck_flash.js |  300 [32m++++[m
 .../editor/dialog/fck_flash/fck_flash_preview.html |   50 [32m+[m
 develop/fckeditor/editor/dialog/fck_form.html      |  109 [32m++[m
 .../fckeditor/editor/dialog/fck_hiddenfield.html   |  115 [32m++[m
 develop/fckeditor/editor/dialog/fck_image.html     |  258 [32m++++[m
 .../fckeditor/editor/dialog/fck_image/fck_image.js |  512 [32m+++++++[m
 .../editor/dialog/fck_image/fck_image_preview.html |   72 [32m+[m
 develop/fckeditor/editor/dialog/fck_link.html      |  295 [32m++++[m
 .../fckeditor/editor/dialog/fck_link/fck_link.js   |  893 [32m++++++++++++[m
 develop/fckeditor/editor/dialog/fck_listprop.html  |  120 [32m++[m
 develop/fckeditor/editor/dialog/fck_paste.html     |  347 [32m+++++[m
 .../fckeditor/editor/dialog/fck_radiobutton.html   |  104 [32m++[m
 develop/fckeditor/editor/dialog/fck_replace.html   |  650 [32m+++++++++[m
 develop/fckeditor/editor/dialog/fck_select.html    |  180 [32m+++[m
 .../editor/dialog/fck_select/fck_select.js         |  194 [32m+++[m
 develop/fckeditor/editor/dialog/fck_smiley.html    |  111 [32m++[m
 develop/fckeditor/editor/dialog/fck_source.html    |   68 [32m+[m
 .../fckeditor/editor/dialog/fck_specialchar.html   |  121 [32m++[m
 .../fckeditor/editor/dialog/fck_spellerpages.html  |   70 [32m+[m
 .../fck_spellerpages/spellerpages/blank.html       |    0
 .../fck_spellerpages/spellerpages/controlWindow.js |   87 [32m++[m
 .../fck_spellerpages/spellerpages/controls.html    |  153 [32m++[m
 .../spellerpages/server-scripts/spellchecker.cfm   |  148 [32m++[m
 .../spellerpages/server-scripts/spellchecker.php   |  199 [32m+++[m
 .../spellerpages/server-scripts/spellchecker.pl    |  181 [32m+++[m
 .../fck_spellerpages/spellerpages/spellChecker.js  |  461 [32m++++++[m
 .../spellerpages/spellchecker.html                 |   71 [32m+[m
 .../fck_spellerpages/spellerpages/spellerStyle.css |   49 [32m+[m
 .../fck_spellerpages/spellerpages/wordWindow.js    |  272 [32m++++[m
 develop/fckeditor/editor/dialog/fck_table.html     |  439 [32m++++++[m
 develop/fckeditor/editor/dialog/fck_tablecell.html |  293 [32m++++[m
 develop/fckeditor/editor/dialog/fck_template.html  |  242 [32m++++[m
 .../dialog/fck_template/images/template1.gif       |  Bin [31m0[m -> [32m375[m bytes
 .../dialog/fck_template/images/template2.gif       |  Bin [31m0[m -> [32m333[m bytes
 .../dialog/fck_template/images/template3.gif       |  Bin [31m0[m -> [32m422[m bytes
 develop/fckeditor/editor/dialog/fck_textarea.html  |   94 [32m++[m
 develop/fckeditor/editor/dialog/fck_textfield.html |  136 [32m++[m
 develop/fckeditor/editor/dtd/fck_dtd_test.html     |   41 [32m+[m
 develop/fckeditor/editor/dtd/fck_xhtml10strict.js  |  116 [32m++[m
 .../editor/dtd/fck_xhtml10transitional.js          |  140 [32m++[m
 develop/fckeditor/editor/fckdebug.html             |  153 [32m++[m
 develop/fckeditor/editor/fckdialog.html            |  819 [32m+++++++++++[m
 develop/fckeditor/editor/fckeditor.html            |  317 [32m+++++[m
 develop/fckeditor/editor/fckeditor.original.html   |  424 [32m++++++[m
 .../editor/filemanager/browser/default/browser.css |   87 [32m++[m
 .../filemanager/browser/default/browser.html       |  200 [32m+++[m
 .../browser/default/frmactualfolder.html           |   95 [32m++[m
 .../browser/default/frmcreatefolder.html           |  114 [32m++[m
 .../filemanager/browser/default/frmfolders.html    |  198 [32m+++[m
 .../browser/default/frmresourceslist.html          |  169 [32m+++[m
 .../browser/default/frmresourcetype.html           |   69 [32m+[m
 .../filemanager/browser/default/frmupload.html     |  115 [32m++[m
 .../browser/default/images/ButtonArrow.gif         |  Bin [31m0[m -> [32m138[m bytes
 .../filemanager/browser/default/images/Folder.gif  |  Bin [31m0[m -> [32m128[m bytes
 .../browser/default/images/Folder32.gif            |  Bin [31m0[m -> [32m281[m bytes
 .../browser/default/images/FolderOpened.gif        |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/FolderOpened32.gif      |  Bin [31m0[m -> [32m264[m bytes
 .../browser/default/images/FolderUp.gif            |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/icons/32/ai.gif         |  Bin [31m0[m -> [32m1140[m bytes
 .../browser/default/images/icons/32/avi.gif        |  Bin [31m0[m -> [32m454[m bytes
 .../browser/default/images/icons/32/bmp.gif        |  Bin [31m0[m -> [32m709[m bytes
 .../browser/default/images/icons/32/cs.gif         |  Bin [31m0[m -> [32m224[m bytes
 .../default/images/icons/32/default.icon.gif       |  Bin [31m0[m -> [32m177[m bytes
 .../browser/default/images/icons/32/dll.gif        |  Bin [31m0[m -> [32m258[m bytes
 .../browser/default/images/icons/32/doc.gif        |  Bin [31m0[m -> [32m260[m bytes
 .../browser/default/images/icons/32/exe.gif        |  Bin [31m0[m -> [32m170[m bytes
 .../browser/default/images/icons/32/fla.gif        |  Bin [31m0[m -> [32m946[m bytes
 .../browser/default/images/icons/32/gif.gif        |  Bin [31m0[m -> [32m704[m bytes
 .../browser/default/images/icons/32/htm.gif        |  Bin [31m0[m -> [32m1527[m bytes
 .../browser/default/images/icons/32/html.gif       |  Bin [31m0[m -> [32m1527[m bytes
 .../browser/default/images/icons/32/jpg.gif        |  Bin [31m0[m -> [32m463[m bytes
 .../browser/default/images/icons/32/js.gif         |  Bin [31m0[m -> [32m274[m bytes
 .../browser/default/images/icons/32/mdb.gif        |  Bin [31m0[m -> [32m274[m bytes
 .../browser/default/images/icons/32/mp3.gif        |  Bin [31m0[m -> [32m454[m bytes
 .../browser/default/images/icons/32/pdf.gif        |  Bin [31m0[m -> [32m567[m bytes
 .../browser/default/images/icons/32/png.gif        |  Bin [31m0[m -> [32m464[m bytes
 .../browser/default/images/icons/32/ppt.gif        |  Bin [31m0[m -> [32m254[m bytes
 .../browser/default/images/icons/32/rdp.gif        |  Bin [31m0[m -> [32m1493[m bytes
 .../browser/default/images/icons/32/swf.gif        |  Bin [31m0[m -> [32m725[m bytes
 .../browser/default/images/icons/32/swt.gif        |  Bin [31m0[m -> [32m724[m bytes
 .../browser/default/images/icons/32/txt.gif        |  Bin [31m0[m -> [32m213[m bytes
 .../browser/default/images/icons/32/vsd.gif        |  Bin [31m0[m -> [32m277[m bytes
 .../browser/default/images/icons/32/xls.gif        |  Bin [31m0[m -> [32m271[m bytes
 .../browser/default/images/icons/32/xml.gif        |  Bin [31m0[m -> [32m408[m bytes
 .../browser/default/images/icons/32/zip.gif        |  Bin [31m0[m -> [32m368[m bytes
 .../browser/default/images/icons/ai.gif            |  Bin [31m0[m -> [32m403[m bytes
 .../browser/default/images/icons/avi.gif           |  Bin [31m0[m -> [32m249[m bytes
 .../browser/default/images/icons/bmp.gif           |  Bin [31m0[m -> [32m126[m bytes
 .../browser/default/images/icons/cs.gif            |  Bin [31m0[m -> [32m128[m bytes
 .../browser/default/images/icons/default.icon.gif  |  Bin [31m0[m -> [32m113[m bytes
 .../browser/default/images/icons/dll.gif           |  Bin [31m0[m -> [32m132[m bytes
 .../browser/default/images/icons/doc.gif           |  Bin [31m0[m -> [32m140[m bytes
 .../browser/default/images/icons/exe.gif           |  Bin [31m0[m -> [32m109[m bytes
 .../browser/default/images/icons/fla.gif           |  Bin [31m0[m -> [32m382[m bytes
 .../browser/default/images/icons/gif.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/htm.gif           |  Bin [31m0[m -> [32m621[m bytes
 .../browser/default/images/icons/html.gif          |  Bin [31m0[m -> [32m621[m bytes
 .../browser/default/images/icons/jpg.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/js.gif            |  Bin [31m0[m -> [32m139[m bytes
 .../browser/default/images/icons/mdb.gif           |  Bin [31m0[m -> [32m146[m bytes
 .../browser/default/images/icons/mp3.gif           |  Bin [31m0[m -> [32m249[m bytes
 .../browser/default/images/icons/pdf.gif           |  Bin [31m0[m -> [32m230[m bytes
 .../browser/default/images/icons/png.gif           |  Bin [31m0[m -> [32m125[m bytes
 .../browser/default/images/icons/ppt.gif           |  Bin [31m0[m -> [32m139[m bytes
 .../browser/default/images/icons/rdp.gif           |  Bin [31m0[m -> [32m606[m bytes
 .../browser/default/images/icons/swf.gif           |  Bin [31m0[m -> [32m388[m bytes
 .../browser/default/images/icons/swt.gif           |  Bin [31m0[m -> [32m388[m bytes
 .../browser/default/images/icons/txt.gif           |  Bin [31m0[m -> [32m122[m bytes
 .../browser/default/images/icons/vsd.gif           |  Bin [31m0[m -> [32m136[m bytes
 .../browser/default/images/icons/xls.gif           |  Bin [31m0[m -> [32m138[m bytes
 .../browser/default/images/icons/xml.gif           |  Bin [31m0[m -> [32m231[m bytes
 .../browser/default/images/icons/zip.gif           |  Bin [31m0[m -> [32m235[m bytes
 .../filemanager/browser/default/images/spacer.gif  |  Bin [31m0[m -> [32m43[m bytes
 .../filemanager/browser/default/js/common.js       |   88 [32m++[m
 .../filemanager/browser/default/js/fckxml.js       |  147 [32m++[m
 .../editor/filemanager/connectors/asp/basexml.asp  |   67 [32m+[m
 .../filemanager/connectors/asp/class_upload.asp    |  353 [32m+++++[m
 .../editor/filemanager/connectors/asp/commands.asp |  202 [32m+++[m
 .../editor/filemanager/connectors/asp/config.asp   |  128 [32m++[m
 .../filemanager/connectors/asp/connector.asp       |   88 [32m++[m
 .../editor/filemanager/connectors/asp/io.asp       |  247 [32m++++[m
 .../editor/filemanager/connectors/asp/upload.asp   |   65 [32m+[m
 .../editor/filemanager/connectors/asp/util.asp     |   55 [32m+[m
 .../editor/filemanager/connectors/aspx/config.ascx |   98 [32m++[m
 .../filemanager/connectors/aspx/connector.aspx     |   32 [32m+[m
 .../editor/filemanager/connectors/aspx/upload.aspx |   32 [32m+[m
 .../filemanager/connectors/cfm/ImageObject.cfc     |  273 [32m++++[m
 .../filemanager/connectors/cfm/cf5_connector.cfm   |  330 [32m+++++[m
 .../filemanager/connectors/cfm/cf5_upload.cfm      |  309 [32m++++[m
 .../filemanager/connectors/cfm/cf_basexml.cfm      |   72 [32m+[m
 .../filemanager/connectors/cfm/cf_commands.cfm     |  230 [32m+++[m
 .../filemanager/connectors/cfm/cf_connector.cfm    |   89 [32m++[m
 .../editor/filemanager/connectors/cfm/cf_io.cfm    |  299 [32m++++[m
 .../filemanager/connectors/cfm/cf_upload.cfm       |   71 [32m+[m
 .../editor/filemanager/connectors/cfm/cf_util.cfm  |  131 [32m++[m
 .../editor/filemanager/connectors/cfm/config.cfm   |  188 [32m+++[m
 .../filemanager/connectors/cfm/connector.cfm       |   32 [32m+[m
 .../editor/filemanager/connectors/cfm/image.cfc    | 1324 [32m+++++++++++++++++[m
 .../editor/filemanager/connectors/cfm/upload.cfm   |   31 [32m+[m
 .../filemanager/connectors/lasso/config.lasso      |   65 [32m+[m
 .../filemanager/connectors/lasso/connector.lasso   |  330 [32m+++++[m
 .../filemanager/connectors/lasso/upload.lasso      |  178 [32m+++[m
 .../editor/filemanager/connectors/perl/basexml.pl  |   68 [32m+[m
 .../editor/filemanager/connectors/perl/commands.pl |  200 [32m+++[m
 .../editor/filemanager/connectors/perl/config.pl   |   39 [32m+[m
 .../filemanager/connectors/perl/connector.cgi      |  129 [32m++[m
 .../editor/filemanager/connectors/perl/io.pl       |  141 [32m++[m
 .../editor/filemanager/connectors/perl/upload.cgi  |   87 [32m++[m
 .../filemanager/connectors/perl/upload_fck.pl      |  686 [32m+++++++++[m
 .../editor/filemanager/connectors/perl/util.pl     |   66 [32m+[m
 .../editor/filemanager/connectors/php/basexml.php  |   99 [32m++[m
 .../editor/filemanager/connectors/php/commands.php |  280 [32m++++[m
 .../editor/filemanager/connectors/php/config.php   |  153 [32m++[m
 .../filemanager/connectors/php/connector.php       |   87 [32m++[m
 .../editor/filemanager/connectors/php/io.php       |  303 [32m++++[m
 .../filemanager/connectors/php/phpcompat.php       |   17 [32m+[m
 .../editor/filemanager/connectors/php/upload.php   |   59 [32m+[m
 .../editor/filemanager/connectors/php/util.php     |  220 [32m+++[m
 .../editor/filemanager/connectors/py/config.py     |  146 [32m++[m
 .../editor/filemanager/connectors/py/connector.py  |  121 [32m++[m
 .../filemanager/connectors/py/fckcommands.py       |  202 [32m+++[m
 .../filemanager/connectors/py/fckconnector.py      |   90 [32m++[m
 .../editor/filemanager/connectors/py/fckoutput.py  |  119 [32m++[m
 .../editor/filemanager/connectors/py/fckutil.py    |  130 [32m++[m
 .../editor/filemanager/connectors/py/htaccess.txt  |   23 [32m+[m
 .../editor/filemanager/connectors/py/upload.py     |   88 [32m++[m
 .../editor/filemanager/connectors/py/wsgi.py       |   58 [32m+[m
 .../editor/filemanager/connectors/py/zope.py       |  188 [32m+++[m
 .../editor/filemanager/connectors/test.html        |  210 [32m+++[m
 .../editor/filemanager/connectors/uploadtest.html  |  192 [32m+++[m
 develop/fckeditor/editor/images/anchor.gif         |  Bin [31m0[m -> [32m184[m bytes
 develop/fckeditor/editor/images/arrow_ltr.gif      |  Bin [31m0[m -> [32m49[m bytes
 develop/fckeditor/editor/images/arrow_rtl.gif      |  Bin [31m0[m -> [32m49[m bytes
 .../editor/images/smiley/msn/angel_smile.gif       |  Bin [31m0[m -> [32m445[m bytes
 .../editor/images/smiley/msn/angry_smile.gif       |  Bin [31m0[m -> [32m453[m bytes
 .../editor/images/smiley/msn/broken_heart.gif      |  Bin [31m0[m -> [32m423[m bytes
 .../fckeditor/editor/images/smiley/msn/cake.gif    |  Bin [31m0[m -> [32m453[m bytes
 .../editor/images/smiley/msn/confused_smile.gif    |  Bin [31m0[m -> [32m322[m bytes
 .../editor/images/smiley/msn/cry_smile.gif         |  Bin [31m0[m -> [32m473[m bytes
 .../editor/images/smiley/msn/devil_smile.gif       |  Bin [31m0[m -> [32m444[m bytes
 .../editor/images/smiley/msn/embaressed_smile.gif  |  Bin [31m0[m -> [32m1077[m bytes
 .../editor/images/smiley/msn/envelope.gif          |  Bin [31m0[m -> [32m1030[m bytes
 .../fckeditor/editor/images/smiley/msn/heart.gif   |  Bin [31m0[m -> [32m1012[m bytes
 .../fckeditor/editor/images/smiley/msn/kiss.gif    |  Bin [31m0[m -> [32m978[m bytes
 .../editor/images/smiley/msn/lightbulb.gif         |  Bin [31m0[m -> [32m303[m bytes
 .../editor/images/smiley/msn/omg_smile.gif         |  Bin [31m0[m -> [32m342[m bytes
 .../editor/images/smiley/msn/regular_smile.gif     |  Bin [31m0[m -> [32m1036[m bytes
 .../editor/images/smiley/msn/sad_smile.gif         |  Bin [31m0[m -> [32m1039[m bytes
 .../editor/images/smiley/msn/shades_smile.gif      |  Bin [31m0[m -> [32m1059[m bytes
 .../editor/images/smiley/msn/teeth_smile.gif       |  Bin [31m0[m -> [32m1064[m bytes
 .../editor/images/smiley/msn/thumbs_down.gif       |  Bin [31m0[m -> [32m992[m bytes
 .../editor/images/smiley/msn/thumbs_up.gif         |  Bin [31m0[m -> [32m989[m bytes
 .../editor/images/smiley/msn/tounge_smile.gif      |  Bin [31m0[m -> [32m1055[m bytes
 .../smiley/msn/whatchutalkingabout_smile.gif       |  Bin [31m0[m -> [32m1034[m bytes
 .../editor/images/smiley/msn/wink_smile.gif        |  Bin [31m0[m -> [32m1041[m bytes
 develop/fckeditor/editor/images/spacer.gif         |  Bin [31m0[m -> [32m43[m bytes
 develop/fckeditor/editor/js/fckadobeair.js         |  176 [32m+++[m
 develop/fckeditor/editor/js/fckeditorcode_gecko.js |  108 [32m++[m
 develop/fckeditor/editor/js/fckeditorcode_ie.js    |  109 [32m++[m
 .../fckeditor/editor/lang/_translationstatus.txt   |   79 [32m++[m
 develop/fckeditor/editor/lang/af.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ar.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/bg.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/bn.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/bs.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ca.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/cs.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/da.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/de.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/el.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/en-au.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/en-ca.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/en-uk.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/en.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/eo.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/es.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/et.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/eu.js                |  535 [32m+++++++[m
 develop/fckeditor/editor/lang/fa.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/fi.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/fo.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/fr-ca.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/fr.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/gl.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/gu.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/he.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/hi.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/hr.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/hu.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/is.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/it.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ja.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/km.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ko.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/lt.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/lv.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/mn.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ms.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/nb.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/nl.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/no.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/pl.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/pt-br.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/pt.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ro.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/ru.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/sk.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/sl.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/sr-latn.js           |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/sr.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/sv.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/th.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/tr.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/uk.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/vi.js                |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/zh-cn.js             |  534 [32m+++++++[m
 develop/fckeditor/editor/lang/zh.js                |  534 [32m+++++++[m
 .../fckeditor/editor/plugins/autogrow/fckplugin.js |  111 [32m++[m
 .../editor/plugins/bbcode/_sample/sample.config.js |   26 [32m+[m
 .../editor/plugins/bbcode/_sample/sample.html      |   67 [32m+[m
 .../fckeditor/editor/plugins/bbcode/fckplugin.js   |  123 [32m++[m
 .../editor/plugins/dragresizetable/fckplugin.js    |  529 [32m+++++++[m
 .../plugins/placeholder/fck_placeholder.html       |  105 [32m++[m
 .../editor/plugins/placeholder/fckplugin.js        |  187 [32m+++[m
 .../editor/plugins/placeholder/lang/de.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/en.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/es.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/fr.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/it.js          |   27 [32m+[m
 .../editor/plugins/placeholder/lang/pl.js          |   27 [32m+[m
 .../editor/plugins/placeholder/placeholder.gif     |  Bin [31m0[m -> [32m96[m bytes
 .../editor/plugins/simplecommands/fckplugin.js     |   29 [32m+[m
 .../editor/plugins/tablecommands/fckplugin.js      |   33 [32m+[m
 develop/fckeditor/editor/skins/_fckviewstrips.html |  121 [32m++[m
 .../fckeditor/editor/skins/default/fck_dialog.css  |  402 [32m++++++[m
 .../editor/skins/default/fck_dialog_ie6.js         |  110 [32m++[m
 .../fckeditor/editor/skins/default/fck_editor.css  |  464 [32m++++++[m
 .../fckeditor/editor/skins/default/fck_strip.gif   |  Bin [31m0[m -> [32m5175[m bytes
 .../editor/skins/default/images/dialog.sides.gif   |  Bin [31m0[m -> [32m48[m bytes
 .../editor/skins/default/images/dialog.sides.png   |  Bin [31m0[m -> [32m178[m bytes
 .../skins/default/images/dialog.sides.rtl.png      |  Bin [31m0[m -> [32m181[m bytes
 .../editor/skins/default/images/sprites.gif        |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/default/images/sprites.png        |  Bin [31m0[m -> [32m3250[m bytes
 .../skins/default/images/toolbar.arrowright.gif    |  Bin [31m0[m -> [32m53[m bytes
 .../skins/default/images/toolbar.buttonarrow.gif   |  Bin [31m0[m -> [32m46[m bytes
 .../skins/default/images/toolbar.collapse.gif      |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/default/images/toolbar.end.gif    |  Bin [31m0[m -> [32m43[m bytes
 .../editor/skins/default/images/toolbar.expand.gif |  Bin [31m0[m -> [32m152[m bytes
 .../skins/default/images/toolbar.separator.gif     |  Bin [31m0[m -> [32m58[m bytes
 .../editor/skins/default/images/toolbar.start.gif  |  Bin [31m0[m -> [32m105[m bytes
 .../editor/skins/office2003/fck_dialog.css         |  402 [32m++++++[m
 .../editor/skins/office2003/fck_dialog_ie6.js      |  110 [32m++[m
 .../editor/skins/office2003/fck_editor.css         |  476 [32m+++++++[m
 .../editor/skins/office2003/fck_strip.gif          |  Bin [31m0[m -> [32m9668[m bytes
 .../skins/office2003/images/dialog.sides.gif       |  Bin [31m0[m -> [32m48[m bytes
 .../skins/office2003/images/dialog.sides.png       |  Bin [31m0[m -> [32m203[m bytes
 .../skins/office2003/images/dialog.sides.rtl.png   |  Bin [31m0[m -> [32m205[m bytes
 .../editor/skins/office2003/images/sprites.gif     |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/office2003/images/sprites.png     |  Bin [31m0[m -> [32m3305[m bytes
 .../skins/office2003/images/toolbar.arrowright.gif |  Bin [31m0[m -> [32m53[m bytes
 .../editor/skins/office2003/images/toolbar.bg.gif  |  Bin [31m0[m -> [32m73[m bytes
 .../office2003/images/toolbar.buttonarrow.gif      |  Bin [31m0[m -> [32m46[m bytes
 .../skins/office2003/images/toolbar.collapse.gif   |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/office2003/images/toolbar.end.gif |  Bin [31m0[m -> [32m124[m bytes
 .../skins/office2003/images/toolbar.expand.gif     |  Bin [31m0[m -> [32m152[m bytes
 .../skins/office2003/images/toolbar.separator.gif  |  Bin [31m0[m -> [32m67[m bytes
 .../skins/office2003/images/toolbar.start.gif      |  Bin [31m0[m -> [32m99[m bytes
 .../fckeditor/editor/skins/silver/fck_dialog.css   |  402 [32m++++++[m
 .../editor/skins/silver/fck_dialog_ie6.js          |  110 [32m++[m
 .../fckeditor/editor/skins/silver/fck_editor.css   |  473 [32m++++++[m
 .../fckeditor/editor/skins/silver/fck_strip.gif    |  Bin [31m0[m -> [32m5175[m bytes
 .../editor/skins/silver/images/dialog.sides.gif    |  Bin [31m0[m -> [32m48[m bytes
 .../editor/skins/silver/images/dialog.sides.png    |  Bin [31m0[m -> [32m198[m bytes
 .../skins/silver/images/dialog.sides.rtl.png       |  Bin [31m0[m -> [32m200[m bytes
 .../editor/skins/silver/images/sprites.gif         |  Bin [31m0[m -> [32m959[m bytes
 .../editor/skins/silver/images/sprites.png         |  Bin [31m0[m -> [32m3278[m bytes
 .../skins/silver/images/toolbar.arrowright.gif     |  Bin [31m0[m -> [32m53[m bytes
 .../skins/silver/images/toolbar.buttonarrow.gif    |  Bin [31m0[m -> [32m46[m bytes
 .../skins/silver/images/toolbar.buttonbg.gif       |  Bin [31m0[m -> [32m829[m bytes
 .../skins/silver/images/toolbar.collapse.gif       |  Bin [31m0[m -> [32m152[m bytes
 .../editor/skins/silver/images/toolbar.end.gif     |  Bin [31m0[m -> [32m43[m bytes
 .../editor/skins/silver/images/toolbar.expand.gif  |  Bin [31m0[m -> [32m152[m bytes
 .../skins/silver/images/toolbar.separator.gif      |  Bin [31m0[m -> [32m58[m bytes
 .../editor/skins/silver/images/toolbar.start.gif   |  Bin [31m0[m -> [32m105[m bytes
 develop/fckeditor/editor/wsc/ciframe.html          |   65 [32m+[m
 develop/fckeditor/editor/wsc/tmpFrameset.html      |   67 [32m+[m
 develop/fckeditor/editor/wsc/w.html                |  227 [32m+++[m
 develop/fckeditor/fckconfig.js                     |  325 [32m+++++[m
 develop/fckeditor/fckeditor.php                    |   31 [32m+[m
 develop/fckeditor/fckeditor_php4.php               |  262 [32m++++[m
 develop/fckeditor/fckeditor_php5.php               |  257 [32m++++[m
 develop/fckeditor/fckstyles.xml                    |  111 [32m++[m
 develop/fckeditor/fcktemplates.xml                 |  103 [32m++[m
 develop/galeries/index.html                        |    1 [32m+[m
 develop/gpl.txt                                    |  675 [32m+++++++++[m
 develop/images/LightNEasy.png                      |  Bin [31m0[m -> [32m147844[m bytes
 develop/images/Logo.png                            |  Bin [31m0[m -> [32m4414[m bytes
 develop/images/aaccept.png                         |  Bin [31m0[m -> [32m2164[m bytes
 develop/images/accept.png                          |  Bin [31m0[m -> [32m1295[m bytes
 develop/images/add.png                             |  Bin [31m0[m -> [32m3836[m bytes
 develop/images/addpage.png                         |  Bin [31m0[m -> [32m1969[m bytes
 develop/images/back.png                            |  Bin [31m0[m -> [32m1482[m bytes
 develop/images/blank.gif                           |  Bin [31m0[m -> [32m43[m bytes
 develop/images/close_blue.png                      |  Bin [31m0[m -> [32m1788[m bytes
 develop/images/close_gold.png                      |  Bin [31m0[m -> [32m1652[m bytes
 develop/images/close_green.png                     |  Bin [31m0[m -> [32m1525[m bytes
 develop/images/close_grey.png                      |  Bin [31m0[m -> [32m1715[m bytes
 develop/images/close_red.png                       |  Bin [31m0[m -> [32m1525[m bytes
 develop/images/closelabel.gif                      |  Bin [31m0[m -> [32m979[m bytes
 develop/images/database.png                        |  Bin [31m0[m -> [32m3436[m bytes
 develop/images/edit.png                            |  Bin [31m0[m -> [32m676[m bytes
 develop/images/editdelete.png                      |  Bin [31m0[m -> [32m1000[m bytes
 develop/images/editdelete1.png                     |  Bin [31m0[m -> [32m865[m bytes
 develop/images/extra.png                           |  Bin [31m0[m -> [32m1327[m bytes
 develop/images/generate.png                        |  Bin [31m0[m -> [32m3761[m bytes
 develop/images/key.png                             |  Bin [31m0[m -> [32m3488[m bytes
 develop/images/loading.gif                         |  Bin [31m0[m -> [32m2767[m bytes
 develop/images/menu.png                            |  Bin [31m0[m -> [32m2278[m bytes
 develop/images/next_blue.gif                       |  Bin [31m0[m -> [32m733[m bytes
 develop/images/next_gold.gif                       |  Bin [31m0[m -> [32m732[m bytes
 develop/images/next_green.gif                      |  Bin [31m0[m -> [32m732[m bytes
 develop/images/next_grey.gif                       |  Bin [31m0[m -> [32m731[m bytes
 develop/images/next_red.gif                        |  Bin [31m0[m -> [32m732[m bytes
 develop/images/nextlabel.gif                       |  Bin [31m0[m -> [32m354[m bytes
 develop/images/pause_blue.png                      |  Bin [31m0[m -> [32m1357[m bytes
 develop/images/pause_gold.png                      |  Bin [31m0[m -> [32m1207[m bytes
 develop/images/pause_green.png                     |  Bin [31m0[m -> [32m1149[m bytes
 develop/images/pause_grey.png                      |  Bin [31m0[m -> [32m1282[m bytes
 develop/images/pause_red.png                       |  Bin [31m0[m -> [32m1133[m bytes
 develop/images/play_blue.png                       |  Bin [31m0[m -> [32m1231[m bytes
 develop/images/play_gold.png                       |  Bin [31m0[m -> [32m1141[m bytes
 develop/images/play_green.png                      |  Bin [31m0[m -> [32m1097[m bytes
 develop/images/play_grey.png                       |  Bin [31m0[m -> [32m1178[m bytes
 develop/images/play_red.png                        |  Bin [31m0[m -> [32m1079[m bytes
 develop/images/plugins.png                         |  Bin [31m0[m -> [32m2815[m bytes
 develop/images/prev_blue.gif                       |  Bin [31m0[m -> [32m748[m bytes
 develop/images/prev_gold.gif                       |  Bin [31m0[m -> [32m748[m bytes
 develop/images/prev_green.gif                      |  Bin [31m0[m -> [32m748[m bytes
 develop/images/prev_grey.gif                       |  Bin [31m0[m -> [32m748[m bytes
 develop/images/prev_red.gif                        |  Bin [31m0[m -> [32m748[m bytes
 develop/images/prevlabel.gif                       |  Bin [31m0[m -> [32m371[m bytes
 develop/images/rss.png                             |  Bin [31m0[m -> [32m594[m bytes
 develop/images/setup.png                           |  Bin [31m0[m -> [32m1446[m bytes
 develop/images/spacer.gif                          |  Bin [31m0[m -> [32m44[m bytes
 develop/images/tools.png                           |  Bin [31m0[m -> [32m1467[m bytes
 develop/images/toolss.png                          |  Bin [31m0[m -> [32m951[m bytes
 develop/images/user.png                            |  Bin [31m0[m -> [32m2395[m bytes
 develop/images/valid-css.png                       |  Bin [31m0[m -> [32m1298[m bytes
 develop/images/valid-xhtml10.png                   |  Bin [31m0[m -> [32m1363[m bytes
 develop/images/wyz.png                             |  Bin [31m0[m -> [32m917[m bytes
 develop/index.php                                  |   16 [32m+[m
 develop/js/dewplayer.swf                           |  Bin [31m0[m -> [32m4271[m bytes
 develop/js/dewplayer.txt                           |    1 [32m+[m
 develop/js/index.html                              |    1 [32m+[m
 develop/js/lytebox.js                              |  855 [32m+++++++++++[m
 develop/languages/lang_en_US.php                   |  162 [32m+++[m
 develop/plugins/forum/header.mod                   |    2 [32m+[m
 develop/plugins/forum/header.ori                   |    2 [32m+[m
 develop/plugins/forum/include.mod                  |  527 [32m+++++++[m
 develop/plugins/forum/lang/lang_en_US.php          |   35 [32m+[m
 develop/plugins/forum/layout/style.css             |  169 [32m+++[m
 develop/plugins/forum/settings.php                 |    7 [32m+[m
 develop/plugins/forum/setup.mod                    |   79 [32m++[m
 develop/plugins/forum/theme/blue.css               |   73 [32m+[m
 develop/plugins/forum/theme/brown.css              |   95 [32m++[m
 develop/plugins/forum/theme/green.css              |   70 [32m+[m
 develop/plugins/index.html                         |    1 [32m+[m
 develop/templates/BinaryNews/images/Thumbs.db      |  Bin [31m0[m -> [32m13824[m bytes
 develop/templates/BinaryNews/images/bg.gif         |  Bin [31m0[m -> [32m1526[m bytes
 develop/templates/BinaryNews/images/bg.jpg         |  Bin [31m0[m -> [32m13693[m bytes
 develop/templates/BinaryNews/images/comment.gif    |  Bin [31m0[m -> [32m839[m bytes
 develop/templates/BinaryNews/images/footer.jpg     |  Bin [31m0[m -> [32m28249[m bytes
 develop/templates/BinaryNews/images/footer.old     |  Bin [31m0[m -> [32m28169[m bytes
 develop/templates/BinaryNews/images/header.jpg     |  Bin [31m0[m -> [32m62062[m bytes
 develop/templates/BinaryNews/images/menu.jpg       |  Bin [31m0[m -> [32m19635[m bytes
 develop/templates/BinaryNews/images/preheader.jpg  |  Bin [31m0[m -> [32m33739[m bytes
 develop/templates/BinaryNews/images/timeicon.gif   |  Bin [31m0[m -> [32m848[m bytes
 develop/templates/BinaryNews/style.css             |  332 [32m+++++[m
 develop/templates/BinaryNews/template.php          |   48 [32m+[m
 develop/templates/admintemplate/images/lne.png     |  Bin [31m0[m -> [32m17805[m bytes
 develop/templates/admintemplate/images/topbg.png   |  Bin [31m0[m -> [32m388[m bytes
 develop/templates/admintemplate/style.css          |  376 [32m+++++[m
 develop/templates/admintemplate/template.php       |   45 [32m+[m
 develop/templates/dropdown/images/bg.gif           |  Bin [31m0[m -> [32m266[m bytes
 develop/templates/dropdown/images/headerphoto1.jpg |  Bin [31m0[m -> [32m29615[m bytes
 develop/templates/dropdown/images/menu3.gif        |  Bin [31m0[m -> [32m1871[m bytes
 develop/templates/dropdown/images/menubg.gif       |  Bin [31m0[m -> [32m99[m bytes
 develop/templates/dropdown/images/menubg2.gif      |  Bin [31m0[m -> [32m151[m bytes
 develop/templates/dropdown/style.css               |  349 [32m+++++[m
 develop/templates/dropdown/template.php            |   28 [32m+[m
 develop/templates/eatlon_3C/images/banner.gif      |  Bin [31m0[m -> [32m23694[m bytes
 develop/templates/eatlon_3C/images/body_bg.gif     |  Bin [31m0[m -> [32m1245[m bytes
 develop/templates/eatlon_3C/images/bottom_bg.gif   |  Bin [31m0[m -> [32m6240[m bytes
 develop/templates/eatlon_3C/images/feed.gif        |  Bin [31m0[m -> [32m8274[m bytes
 develop/templates/eatlon_3C/images/head_bg.gif     |  Bin [31m0[m -> [32m891[m bytes
 develop/templates/eatlon_3C/images/menu_bg.gif     |  Bin [31m0[m -> [32m5576[m bytes
 develop/templates/eatlon_3C/style.css              |  322 [32m+++++[m
 develop/templates/eatlon_3C/template.php           |   40 [32m+[m
 develop/templates/lightneasy/images/a1.gif         |  Bin [31m0[m -> [32m430[m bytes
 develop/templates/lightneasy/images/a2.gif         |  Bin [31m0[m -> [32m436[m bytes
 develop/templates/lightneasy/images/a3.gif         |  Bin [31m0[m -> [32m464[m bytes
 develop/templates/lightneasy/images/a4.gif         |  Bin [31m0[m -> [32m470[m bytes
 develop/templates/lightneasy/images/a5.gif         |  Bin [31m0[m -> [32m353[m bytes
 develop/templates/lightneasy/images/a6.gif         |  Bin [31m0[m -> [32m458[m bytes
 develop/templates/lightneasy/images/a7.gif         |  Bin [31m0[m -> [32m271[m bytes
 develop/templates/lightneasy/images/a8.gif         |  Bin [31m0[m -> [32m273[m bytes
 .../templates/lightneasy/images/colunabottom.png   |  Bin [31m0[m -> [32m462[m bytes
 develop/templates/lightneasy/images/colunatop.png  |  Bin [31m0[m -> [32m1123[m bytes
 develop/templates/lightneasy/images/fundo.png      |  Bin [31m0[m -> [32m232[m bytes
 develop/templates/lightneasy/images/lne.png        |  Bin [31m0[m -> [32m15423[m bytes
 develop/templates/lightneasy/images/lneicon.png    |  Bin [31m0[m -> [32m3769[m bytes
 develop/templates/lightneasy/images/m1.png         |  Bin [31m0[m -> [32m652[m bytes
 develop/templates/lightneasy/images/m2.png         |  Bin [31m0[m -> [32m722[m bytes
 develop/templates/lightneasy/images/m3.png         |  Bin [31m0[m -> [32m226[m bytes
 develop/templates/lightneasy/images/menub.png      |  Bin [31m0[m -> [32m618[m bytes
 develop/templates/lightneasy/images/menubl.png     |  Bin [31m0[m -> [32m487[m bytes
 develop/templates/lightneasy/images/menubr.png     |  Bin [31m0[m -> [32m422[m bytes
 develop/templates/lightneasy/images/menul.png      |  Bin [31m0[m -> [32m533[m bytes
 develop/templates/lightneasy/images/menur.png      |  Bin [31m0[m -> [32m433[m bytes
 develop/templates/lightneasy/images/topbg.png      |  Bin [31m0[m -> [32m386[m bytes
 develop/templates/lightneasy/images/wrapperbg.png  |  Bin [31m0[m -> [32m369[m bytes
 develop/templates/lightneasy/style.css             |  259 [32m++++[m
 develop/templates/lightneasy/template.php          |   48 [32m+[m
 develop/templates/zenlike/images/bg1.jpg           |  Bin [31m0[m -> [32m14022[m bytes
 develop/templates/zenlike/images/bg2.jpg           |  Bin [31m0[m -> [32m14192[m bytes
 develop/templates/zenlike/images/border1.gif       |  Bin [31m0[m -> [32m171[m bytes
 develop/templates/zenlike/images/border2.gif       |  Bin [31m0[m -> [32m168[m bytes
 develop/templates/zenlike/images/boxbg.gif         |  Bin [31m0[m -> [32m310[m bytes
 develop/templates/zenlike/images/buttonbg.gif      |  Bin [31m0[m -> [32m731[m bytes
 develop/templates/zenlike/images/db1.gif           |  Bin [31m0[m -> [32m776[m bytes
 develop/templates/zenlike/images/db2.gif           |  Bin [31m0[m -> [32m389[m bytes
 develop/templates/zenlike/images/hdrpic.jpg        |  Bin [31m0[m -> [32m17827[m bytes
 develop/templates/zenlike/images/icon-comments.gif |  Bin [31m0[m -> [32m70[m bytes
 develop/templates/zenlike/images/icon-more.gif     |  Bin [31m0[m -> [32m72[m bytes
 .../zenlike/images/icon-printerfriendly.gif        |  Bin [31m0[m -> [32m71[m bytes
 develop/templates/zenlike/images/menuactive.gif    |  Bin [31m0[m -> [32m970[m bytes
 develop/templates/zenlike/images/menubg.gif        |  Bin [31m0[m -> [32m1331[m bytes
 develop/templates/zenlike/images/pic1.jpg          |  Bin [31m0[m -> [32m7347[m bytes
 develop/templates/zenlike/images/pic2.jpg          |  Bin [31m0[m -> [32m2610[m bytes
 develop/templates/zenlike/images/pic3.jpg          |  Bin [31m0[m -> [32m3444[m bytes
 develop/templates/zenlike/images/topbg.gif         |  Bin [31m0[m -> [32m3501[m bytes
 develop/templates/zenlike/style.css                |  313 [32m++++[m
 develop/templates/zenlike/template.php             |   34 [32m+[m
 develop/uploads/index.html                         |    1 [32m+[m
 690 files changed, 92955 insertions(+)

[33mcommit 557db8ffdf0c79df7ce1b0c3214b76a26546788c[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 03:57:46 2013 -0500

    Create Guestbook.java

 Guestbook.java | 97 [32m++++++++++++++++++++++++++++++++++++++++++++++++++++++++++[m
 1 file changed, 97 insertions(+)

[33mcommit edf1a235105c928938e6e59ccc5feade692a14bf[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 03:54:23 2013 -0500

    Create PrimeSearcher.java

 PrimeSearcher.java | 66 [32m++++++++++++++++++++++++++++++++++++++++++++++++++++++[m
 1 file changed, 66 insertions(+)

[33mcommit 38060747ce64fd1e4f07f6eb11ba07e0512c38cf[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 03:53:43 2013 -0500

    Create InitCounter.java

 InitCounter.java | 28 [32m++++++++++++++++++++++++++++[m
 1 file changed, 28 insertions(+)

[33mcommit a359b454a04a24699ce8757a8284916960707afb[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 03:48:38 2013 -0500

    Create HolisticCounter.java

 HolisticCounter.java | 32 [32m++++++++++++++++++++++++++++++++[m
 1 file changed, 32 insertions(+)

[33mcommit 68e19c0c5fd2f097dfddf735c508ab46ff5ee7b3[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 03:35:41 2013 -0500

    Create SimpleCounter.java

 SimpleCounter.java | 17 [32m+++++++++++++++++[m
 1 file changed, 17 insertions(+)

[33mcommit 62556c7722472cb4f304e25954a75c24e6f86638[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 03:11:46 2013 -0500

    New Folders added!

 test | 1 [32m+[m
 1 file changed, 1 insertion(+)

[33mcommit c24a6df3075e1b4b0ad1e0263ea2ec1ed833c69e[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 03:09:50 2013 -0500

    New java and html files added!

 EchoServlet.java | 153 [32m+++++++++++++++++++++++++++++++++++++++++++++++++++++++[m
 form_input.html  |  41 [32m+++++++++++++++[m
 2 files changed, 194 insertions(+)

[33mcommit 473c4dbf117d4c38cd634ff07c26c5bc2bc21cb8[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 02:48:16 2013 -0500

    Update README.md

 README.md | 5 [32m++++[m[31m-[m
 1 file changed, 4 insertions(+), 1 deletion(-)

[33mcommit 6c540693e94b582cf2da17944566458a6c43260c[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 02:20:53 2013 -0500

    Some few changes has been made to HelloServlet.java

 HelloServlet.java | 50 [32m+++++++++++++++++++++++++[m[31m-------------------------[m
 1 file changed, 25 insertions(+), 25 deletions(-)

[33mcommit 2f56ef60408923835cbe3a34af3995bef1cef86f[m
Merge: a83ac15 39cd2ec
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 02:10:13 2013 -0500

    Merge branch 'master' of https://github.com/1nv4d3r5/test

[33mcommit a83ac155e01fc948b1fe857eab8f801034f78dc2[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 02:03:36 2013 -0500

    HelloServlet.java added!

 HelloServlet.java | 31 [32m+++++++++++++++++++++++++++++++[m
 1 file changed, 31 insertions(+)

[33mcommit 39cd2ec292852140cf6445b71d82f4d762e8cd80[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Sun Jun 16 01:51:24 2013 -0500

    Create README.md

 README.md | 2 [32m++[m
 1 file changed, 2 insertions(+)

[33mcommit 68995d92945ef69999390538ab032c6499c3efc3[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 01:47:24 2013 -0500

    New File Added!

 NewFile.txt | 1 [32m+[m
 1 file changed, 1 insertion(+)

[33mcommit 43b22499adf9b0dd7ff614bdf699d796d0513472[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Sun Jun 16 01:37:21 2013 -0500

    File deleted

 Homework0.java | 5 [31m-----[m
 1 file changed, 5 deletions(-)

[33mcommit 180f4653d427d755225240f0dfb380b9994d95fa[m
Author: 1nv4d3r5 <xr_417@yahoo.com>
Date:   Wed Jun 12 10:15:41 2013 -0500

    Update Homework0.java

 Homework0.java | 26 [32m++++[m[31m----------------------[m
 1 file changed, 4 insertions(+), 22 deletions(-)

[33mcommit 160f7d23a4cc5cb268316b1a7633b4da1ad4fbd8[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Wed Jun 12 10:06:45 2013 -0500

    Second commit

 Homework0.java | 7 [32m+[m[31m------[m
 1 file changed, 1 insertion(+), 6 deletions(-)

[33mcommit d80cdd4986998f83f39d3f812e6cbc699ed3d895[m
Author: 1nv4d3r <xr_417@yahoo.com>
Date:   Wed Jun 12 09:57:11 2013 -0500

    First commit

 Homework0.java | 28 [32m++++++++++++++++++++++++++++[m
 1 file changed, 28 insertions(+)

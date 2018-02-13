; <?php exit; ?> DO NOT REMOVE THIS LINE
test_pdf2swf = 1
test_pdf2json = ""
allowcache = 1
splitmode = 0

path.pdf = "C:\inetpub\swf\test_flexpaper_docs\"
path.swf = "C:\inetpub\swf\test_flexpaper_flex\"

renderingorder.primary = "flash"
renderingorder.secondary = "html"
cmd.conversion.singledoc = "\"C:\Program Files (x86)\SWFTools\pdf2swf.exe\" \"{path.pdf}{pdffile}\" -o \"{path.swf}{pdffile}.swf\" -f -T 9 -t -s storeallcharacters -s linknameurl"
cmd.conversion.splitpages = "\"C:\Program Files (x86)\SWFTools\pdf2swf.exe\" \"{path.pdf}{pdffile}\" -o \"{path.swf}{pdffile}%.swf\" -f -T 9 -t -s storeallcharacters -s linknameurl"
cmd.conversion.renderpage = "\"C:\Program Files (x86)\SWFTools\swfrender.exe\" \"{path.swf}{swffile}\" -p {page} -o \"{path.swf}{pdffile}_{page}.png\" -X 1024 -s keepaspectratio"
cmd.conversion.rendersplitpage = "\"C:\Program Files (x86)\SWFTools\swfrender.exe\" \"{path.swf}{swffile}\" -o \"{path.swf}{pdffile}_{page}.png\" -X 1024 -s keepaspectratio"
cmd.conversion.jsonfile = "\"C:\Program Files (x86)\PDF2JSON\pdf2json.exe\" \"{path.pdf}{pdffile}\" -enc UTF-8 -compress \"{path.swf}{jsonfile}\""
cmd.searching.extracttext = "\"C:\Program Files (x86)\SWFTools\swfstrings.exe\" \"{swffile}\""
cmd.query.swfwidth = "swfdump.exe \"{swffile}\" -X"
cmd.query.swfheight = "swfdump.exe \"{swffile}\" -Y"
pdf2swf = 1
admin.username = "admin"
admin.password = "admin"
licensekey = ""
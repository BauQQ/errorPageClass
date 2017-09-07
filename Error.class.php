<?php

/**
 * Description of Error
 *
 * @author Kasper
 */
class ErrorHandle {

    private $errno;
    private $errstr;
    private $errfile;
    private $errline;
    private $lc = 3; //lines catched

    public function __construct() {
        set_error_handler(array($this, 'xerror'), E_ALL);
    }

    public function forceLoad() {
        set_error_handler(array($this, 'xerror'), E_ALL);
    }

    public function xerror($errno, $errstr, $errfile, $errline) {
        $this->errno = $errno;
        $this->errstr = $errstr;
        $this->errfile = $errfile;
        $this->errline = $errline;
        echo $this->buildPage();
    }

    private function getStyles() {
        $css = '<style>
                .container,.left-panel,.stack-container{height:100%}.frame-comment a,.tooltipped:after,a,code.prettyprint a,pre.prettyprint a{text-decoration:none}.cf:after,.cf:before{content:" ";display:table}.cf:after{clear:both}body{font:12px "Helvetica Neue",helvetica,arial,sans-serif;color:#131313;background:#eee;padding:0;margin:0;max-height:100%;text-rendering:optimizeLegibility}.container{width:100%;position:fixed;margin:0;left:0;top:0}.branding{position:absolute;top:10px;right:20px;color:#777;font-size:10px;z-index:100}.stack-container,.tooltipped{position:relative}.branding a{color:#e95353}header{color:#fff;box-sizing:border-box;background-color:#2a2a2a;padding:35px 40px;max-height:180px;overflow:hidden}header:hover{max-height:1000px}.exc-title{margin:0;color:#bebebe;font-size:14px}.exc-title-primary{color:#e95353}.exc-message{font-size:20px;word-wrap:break-word;margin:4px 0 0;color:#fff}.details-heading,.frame-method-info{margin-bottom:10px}.exc-message-empty-notice{color:#a29d9d;font-weight:300}.details-container{height:100%;overflow:auto;float:right;width:100%;background:#fafafa}.details{padding:5px}.details-heading{color:#4288CE;font-weight:300;padding-bottom:10px;border-bottom:1px solid rgba(0,0,0,.1)}.left-panel{overflow:auto;float:left;width:30%;background:#ded8d8}.frames-description{background:rgba(0,0,0,.05);padding:8px 15px;color:#a29d9d;font-size:11px}.frame{padding:14px;cursor:pointer;transition:all .1s ease;background:#eee}.frame:not(:last-child){border-bottom:1px solid rgba(0,0,0,.05)}.frame.active{box-shadow:inset -5px 0 0 0 #4288CE;color:#4288CE}.frame:not(.active):hover{background:#BEE9EA}.frame-class,.frame-function,.frame-index{font-size:14px}.frame-index{font-size:11px;color:#a29d9d;background-color:rgba(0,0,0,.05);height:18px;width:18px;line-height:18px;border-radius:100%;text-align:center;display:inline-block}.frame-file{font-family:Inconsolata,"Fira Mono","Source Code Pro",Monaco,Consolas,"Lucida Console",monospace;word-wrap:break-word;color:#a29d9d}.frame-file .editor-link{color:#272727}.frame-line{font-weight:700}.frame-line:before{content:":"}.frame-code{padding:5px;background:#303030;display:none}.frame-code.active{display:block}.frame-code .frame-file{color:#a29d9d;padding:12px 6px;border-bottom:none}.code-block,.frame-comment{padding:10px;border-radius:6px}.code-block{margin:0;box-shadow:0 3px 0 rgba(0,0,0,.05),0 10px 30px rgba(0,0,0,.05),inset 0 0 1px 0 rgba(255,255,255,.07)}.linenums{margin:0 0 0 10px}.frame-comments{border-top:none;margin-top:15px;font-size:12px}.frame-comments.empty:before{content:"No comments for this stack frame.";font-weight:300;color:#a29d9d}.frame-comment{color:#e3e3e3;background-color:rgba(255,255,255,.05)}.frame-comment a{font-weight:700}.frame-comment a:hover{color:#4bb1b1}.frame-comment:not(:last-child){border-bottom:1px dotted rgba(0,0,0,.3)}.frame-comment-context{font-size:10px;color:#fff}.data-table-container label{font-size:16px;color:#303030;font-weight:700;margin:10px 0 5px;display:block;padding-bottom:5px}.data-table{width:100%;margin-bottom:10px}.data-table tbody{font:13px Inconsolata,"Fira Mono","Source Code Pro",Monaco,Consolas,"Lucida Console",monospace}.data-table thead{display:none}.data-table tr{padding:5px 0}.data-table td:first-child{width:20%;min-width:130px;overflow:hidden;font-weight:700;color:#463C54;padding-right:5px}.data-table td:last-child{width:80%;-ms-word-break:break-all;word-break:break-all;word-break:break-word;-webkit-hyphens:auto;-moz-hyphens:auto;hyphens:auto}.data-table span.empty{color:rgba(0,0,0,.3);font-weight:300}.data-table label.empty{display:inline}.handler{padding:4px 0;font:14px Inconsolata,"Fira Mono","Source Code Pro",Monaco,Consolas,"Lucida Console",monospace}code .str,pre .str{color:#BCD42A}code .kwd,pre .kwd{color:#4bb1b1;font-weight:700}code .com,pre .com{color:#888;font-weight:700}code .typ,pre .typ{color:#ef7c61}code .lit,pre .lit{color:#BCD42A}code .pun,pre .pun{color:#fff;font-weight:700}code .pln,pre .pln{color:#e9e4e5}code .tag,pre .tag{color:#4bb1b1}code .htm,pre .htm{color:plum}code .xsl,pre .xsl{color:#d0a0d0}code .atn,pre .atn{color:#ef7c61;font-weight:400}code .atv,pre .atv{color:#bcd42a}code .dec,pre .dec{color:#606}code.prettyprint,pre.prettyprint{font-family:Inconsolata,"Fira Mono","Source Code Pro",Monaco,Consolas,"Lucida Console",monospace;background:#333;color:#e9e4e5}pre.prettyprint{white-space:pre-wrap}.linenums li{color:#A5A5A5}.linenums li.current{background:rgba(255,100,100,.07);padding-top:4px;padding-left:1px}.linenums li.current.active{background:rgba(255,100,100,.17)}#plain-exception{display:none}#copy-button{float:right;cursor:pointer;border:0}.clipboard{opacity:.8;background:0 0;color:rgba(255,255,255,.1);box-shadow:inset 0 0 0 2px rgba(255,255,255,.1);border-radius:3px;outline:0!important}.clipboard:hover{box-shadow:inset 0 0 0 2px rgba(255,255,255,.3);color:rgba(255,255,255,.3)}kbd{-moz-border-bottom-colors:none;-moz-border-left-colors:none;-moz-border-right-colors:none;-moz-border-top-colors:none;background-color:#fcfcfc;border-color:#ccc #ccc #bbb;border-image:none;border-style:solid;border-width:1px;color:#555;display:inline-block;font-size:11px;line-height:10px;padding:3px 5px;vertical-align:middle}@media (min-width:1000px){.details,.frame-code{padding:20px 40px;margin-bottom:60px}.details-container{width:100%}.frames-container{margin:5px}.left-panel{width:32%}}.tooltipped:after,.tooltipped:before{position:absolute;display:none;pointer-events:none}.tooltipped:after{z-index:1000000;padding:5px 8px;color:#fff;text-align:center;text-shadow:none;text-transform:none;letter-spacing:normal;word-wrap:break-word;white-space:pre;content:attr(aria-label);background:rgba(0,0,0,.8);border-radius:3px;-webkit-font-smoothing:subpixel-antialiased}.tooltipped:before{z-index:1000001;width:0;height:0;color:rgba(0,0,0,.8);content:"";border:5px solid transparent}.tooltipped:active:after,.tooltipped:active:before,.tooltipped:focus:after,.tooltipped:focus:before,.tooltipped:hover:after,.tooltipped:hover:before{display:inline-block;text-decoration:none}.tooltipped-s:after{top:100%;right:50%;margin-top:5px}.tooltipped-s:before{top:auto;right:50%;bottom:-5px;margin-right:-5px;border-bottom-color:rgba(0,0,0,.8)}
            </style>';
        return $css;
    }

    private function getGlobalGet() {
        if (isset($_GET) && !empty($_GET)) {
            $html = '
                    <div class="data-table" id="sg-get-data">
                        <label class="empty">GET Data</label>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <td class="data-table-k">Key</td>
                                    <td class="data-table-v">Value</td>
                                </tr>
                            </thead>
                            <tbody>';
            foreach ($_GET as $k => $v) {
                $html .= '<tr>
                          <td>' . $k . '</td>
                            <td>' . $v . '</td>
                        </tr>';
            }
            $html .= '
                        </tbody>
                      </table>
                    </div>';
        } else {
            $html = ' <div class="data-table" id="sg-get-data">
                                        <label class="empty">GET Data</label>
                                        <span class="empty">empty</span>
                                    </div>';
        }
        return $html;
    }

    private function getGlobalPost() {
        if (isset($_POST) && !empty($_POST)) {
            $html = '
                    <div class="data-table" id="sg-get-data">
                        <label class="empty">POST Data</label>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <td class="data-table-k">Key</td>
                                    <td class="data-table-v">Value</td>
                                </tr>
                            </thead>
                            <tbody>';
            foreach ($_POST as $k => $v) {
                $html .= '<tr>
                          <td>' . $k . '</td>
                            <td>' . $v . '</td>
                        </tr>';
            }
            $html .= '
                        </tbody>
                      </table>
                    </div>';
        } else {
            $html = ' <div class="data-table" id="sg-get-data">
                                        <label class="empty">POST Data</label>
                                        <span class="empty">empty</span>
                                    </div>';
        }
        return $html;
    }

    private function getSession() {
        if (session_id()) {
            $html = "";
        } else {
            $html = '<div class="data-table" id="sg-session">
                            <label class="empty">Session</label>
                    <span class="empty">empty</span>
                  </div>';
        }
        return $html;
    }

    private function getHeaders() {
        $html = '
                        <div class="data-table" id="sg-serverrequest-data">
                            <label>Server/Request Data</label>
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <td class="data-table-k">Key</td>
                                        <td class="data-table-v">Value</td>
                                    </tr>
                                </thead>
                                <tbody>';
        foreach (getallheaders() as $k => $v) {
            $html .= "<tr>
                                    <td>$k</td>
                                    <td>$v</td>
                                  </tr>";
        }
        foreach ($_SERVER as $k => $v) {

            $html .= "<tr>
                                    <td>$k</td>
                                    <td>$v</td>
                                  </tr>";
        }
        $html .= '
                                </tbody></table>
                        </div>';

        return $html;
    }

    private function getJs() {
        $js = '<script src="./js/custom.js"></script>';
        return $js;
    }

    private function getScriptLines() {
        $file = new SplFileObject($this->errfile);
        $lines = array();
        $startSearch = $this->errline - $this->lc;
        if ($startSearch < 0) {
            $startSearch = 0;
        }
        $endSearch = $this->errline + $this->lc;

        for ($i = $startSearch; $i < $endSearch; $i++) {
            $file->seek($i);
            $lines[$i] = $file->current();
        }
        return array("s" => $startSearch, "l" => $lines, "e" => $endSearch);
    }

    private function startWith($needle, $haystack) {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    private function endsWith($haystack, $needle) {
        $length = strlen($needle);
        return $length === 0 ||
                (substr($haystack, -$length) === $needle);
    }

    private function replaceChars($line) {
        $charArgs = array("//" => "", "}" => '<span class="pun">}</span>',
            '});' => '<span class="pun">});</span>');
        if ($this->startWith("//", $line)) {
            return $line;
        } else {
            
            $sLi = explode(" ", $line);
//            $m = preg_replace("/[^A-Za-z ]/", '', $sLi);
//            print_r($m);
//            exit;
            return $line;
        }
    }

    private function getPHPSCriptParts() {
        $args = $this->getScriptLines();
        $html = '<pre class="code-block prettyprint linenums:' . $args['s'] . ' prettyprinted" style=""><ol class="linenums">';
        $i = 0;
        foreach ($args['l'] as $k => $v) {
            $n = $k + 1;
            $v = $this->replaceChars($v);
            if ($n == $this->errline) {
                $html .= '<li value="' . $n . '" class="L' . $i . ' current active">' . $v . '</li>';
            } else {
                $html .= '<li value="' . $n . '" class="L' . $i . '">' . $v . '</li>';
            }
            $i++;
        }
        $html .= '</pre>';
        return $html;
//        return '<pre class="code-block prettyprint linenums:50 prettyprinted" style=""><ol class="linenums"><li value="50" class="L9"><span class="pln">        </span><span class="kwd">return</span><span class="pln"> $frame</span><span class="pun">;</span></li><li class="L0"><span class="pln">    </span><span class="pun">});</span></li><li class="L1"><span class="pln">&nbsp;</span></li><li class="L2"><span class="pun">});</span></li><li class="L3"><span class="pln">&nbsp;</span></li><li class="L4"><span class="pln">$run</span><span class="pun">-&gt;</span><span class="kwd">register</span><span class="pun">();</span></li><li class="L5"><span class="pln">&nbsp;</span></li><li class="L6"><span class="kwd">function</span><span class="pln"> fooBar</span><span class="pun">()</span></li><li class="L7 current"><span class="pun">{</span></li><li class="L8 current active"><span class="pln">    </span><span class="kwd">throw</span><span class="pln"> </span><span class="kwd">new</span><span class="pln"> </span><span class="typ">Exception</span><span class="pun">(</span><span class="str">"Something broke!"</span><span class="pun">);</span></li><li class="L9 current"><span class="pun">}</span></li><li class="L0"><span class="pln">&nbsp;</span></li><li class="L1"><span class="kwd">function</span><span class="pln"> bar</span><span class="pun">()</span></li><li class="L2"><span class="pun">{</span></li><li class="L3"><span class="pln">    fooBar</span><span class="pun">();</span></li><li class="L4"><span class="pun">}</span></li><li class="L5"><span class="pln">&nbsp;</span></li><li class="L6"><span class="pln">bar</span><span class="pun">();</span></li><li class="L7"><span class="pln"> </span></li></ol></pre>';
    }

    private function buildPage() {
        $html = $this->getStyles();
        $html .= $this->getJs();
        $html .= '<div class="details-container cf">
        <div class="frame-code-container ">

            <div class="frame-code active" id="frame-code-0">
                <div class="frame-file">
                    <strong>' . $this->errfile . '</strong>
                </div>';
        $html .= $this->getPHPSCriptParts();

        $html .= '  <div class="frame-comments empty">
                          </div>
              </div>
                </div>
                <div class="details">
                    <h2 class="details-heading">Environment &amp; details:</h2>

                    <div class="data-table-container" id="data-tables">
                        <div class="data-table" id="sg-get-data">
                            <label class="empty">Error</label>
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <td class="data-table-k">Key</td>
                                        <td class="data-table-v">Value</td>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                  <td>Code</td>
                                    <td>' . $this->errno . '</td>
                                </tr>
                                <tr>
                                  <td>Message</td>
                                    <td>' . $this->errstr . '</td>
                                </tr>
                                <tr>
                                  <td>File</td>
                                    <td>' . $this->errfile . '</td>
                                </tr>
                                <tr>
                                  <td>Line</td>
                                    <td>' . $this->errline . '</td>
                                </tr>

                                </tbody></table>
                        </div>';
        $html .= $this->getGlobalGet();
        $html .= $this->getGlobalPost();
        $html .= $this->getSession();
        $html .= $this->getHeaders();
        $html .= "</div>
                </div>
            </div>";
        return $html;
    }

}

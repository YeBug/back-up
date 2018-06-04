<script type=\"text/javascript\" src=\"../JS.js\"></script>
<?php
/**
 * Created by PhpStorm.
 * User: h1318
 * Date: 18/5/30
 * Time: 20:55
 */

$scid=$_GET['tag'];
echo "<form class=\"form-horizontal\" role=\"form\" method=\"post\" action=\"php/sc_cancle.php\">
                                <input readonly='readonly'name='scid' value='".$scid."'style='display: none' >
                                    <table class=\"table table-hover\">
                                        <thead>
                                        <tr class=\"bg-info\">
                                            <th style=\"font-size: large\">
                                                退课理由
                                            </th>
                                            <th>
                                                <input  id=\"reason\"  name=\"reason\" >
                                            </th>
                                            <th>
                                                <button type=\"submit\" class=\"btn btn-primary\" >确定</button>
                                            </th>
                                        </tr>
                                        </thead>

                                    </table>

                                </form>";

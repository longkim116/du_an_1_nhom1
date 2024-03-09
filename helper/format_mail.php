<?php
// function content_mail($fullname, $time, $order_code, $list_products)
// {
//     $string = `<div class="">
//     <div class="aHl"></div>
//     <div id=":4c2" tabindex="-1"></div>
//     <div id=":48t" class="ii gt" jslog="20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc3ODcwMjI0MDg5MTI1MjIxMiIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc3ODcwMjI0MDg5MTI1MjIxMiIsbnVsbCxbXSxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxbXSxbXSxbXSxudWxsLG51bGwsbnVsbCxudWxsLFtdXQ..">
//         <div id=":4bt" class="a3s aiL ">
//             <div class="adM">
//             </div><u></u>
//             <div>
//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>
//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>
//                                                                         <tr>
//                                                                             <td align="center"><img src="img/logo-autosmart.png" width="140" height="auto" style="width:25%;height:auto" class="CToWUd" data-bit="iit"></td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                                 &nbsp;</td>
//                                                                         </tr>
//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>
//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>
//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>
//                                                                         <tr>
//                                                                             <td style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left;line-height:18px">
//                                                                                 Xin chào ` . $fullname . `,
//                                                                             </td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td width="100%" height="10" style="font-size:1px;line-height:1px">
//                                                                                 &nbsp;</td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left;line-height:18px">

//                                                                                 Đơn hàng <a href="#" style="text-decoration:none;color:#ff5722">` . $order_code . `</a>
//                                                                                 của bạn đã được đặt hàng
//                                                                                 công ngày ` . $time . `. <br><br>
//                                                                                 Vui lòng đăng nhập vào <a href="http://localhost/Du-an-1/autosmart/">Autosmart</a> để theo dõi đơn hàng
//                                                                             </td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td width="100%" height="10" style="font-size:1px;line-height:1px">
//                                                                                 &nbsp;</td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td width="100%" height="10" style="font-size:1px;line-height:1px">
//                                                                                 &nbsp;</td>
//                                                                         </tr>
//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>
//                 <div style="width:100%;height:1px;display:block" align="center">
//                     <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
//                 </div>
//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>
//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>


//                                                                         <tr>
//                                                                             <td colspan="2" style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:16px;font-weight:bold;height:10px">
//                                                                             </td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td colspan="2" style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:13px;font-weight:bold">
//                                                                                 THÔNG TIN ĐƠN HÀNG - DÀNH CHO NGƯỜI MUA
//                                                                             </td>
//                                                                         </tr <tr>
//                                                                         <td height="" style="font-size:1px;line-height:1px" width="100%">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                         <tr>
//                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>
//                 </td>
//                 </tr>
//                 </tbody>
//                 </table>
//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>

//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>

//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>

//                                                                         <tr>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Mã đơn hàng:
//                                                                             </td>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">

//                                                                                 <a href="https://shopee.vn/universal-link/user/purchase/order/149785908214771/?shopid=758111427&amp;deep_and_deferred=1&amp;smtt=580.314060513.7" style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#ff5722;vertical-align:top;width:280px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://shopee.vn/universal-link/user/purchase/order/149785908214771/?shopid%3D758111427%26deep_and_deferred%3D1%26smtt%3D580.314060513.7&amp;source=gmail&amp;ust=1697988775359000&amp;usg=AOvVaw1KfuOQ5Cx4O75PiIGUVC4f">` . $order_code . `</a>

//                                                                             </td>
//                                                                         </tr>
//                                                                         <tr>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Ngày đặt hàng:
//                                                                             </td>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">` . $time . `
//                                                                             </td>
//                                                                         </tr>


//                                                                         <tr>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Người bán:
//                                                                             </td>
//                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%"><a href="http://localhost/Du-an-1/autosmart/" style="text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#ff5722;vertical-align:top;width:280px">Autosmart</a>
//                                                                             </td>
//                                                                         </tr>



//                                                                         <tr>
//                                                                             <td colspan="2" height="20" style="font-size:1px;line-height:1px" width="100%">
//                                                                                 &nbsp;
//                                                                             </td>
//                                                                         </tr>

//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>






//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>

//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>
//                                                                         <tr>
//                                                                             <td>
//                                                                                 <table align="left" border="0" cellpadding="0" cellspacing="0">
//                                                                                     <tbody>
//                                                                                         <tr>
//                                                                                             <td width="100%" height="10" style="font-size:1px;line-height:1px">
//                                                                                                 &nbsp;</td>
//                                                                                         </tr>
//                                                                                     </tbody>
//                                                                                 </table>
//                                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed">`;
//     foreach ($list_products as $item) {
//         $string .= `<tbody>
//                                                                                         <tr>
//                                                                                             <td colspan="2" width="" height="20" style="font-size:1px;line-height:1px">
//                                                                                                 &nbsp;</td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td colspan="2" style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left">
//                                                                                                 ` . $item['product_name'] . `
//                                                                                             </td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Số
//                                                                                                 lượng: </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">` . $item['qty'] . `</td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Giá:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">` . currency_format($item['sub_total']) . `
//                                                                                             </td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td width="100%" height="10" style="font-size:1px;line-height:1px">
//                                                                                                 &nbsp;</td>
//                                                                                         </tr>
//                                                                                     </tbody>`;
//     }
//     $string .= `</table>
//                                                                             </td>
//                                                                         </tr>
//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>



//                 <div style="width:100%;height:1px;display:block" align="center">
//                     <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
//                 </div>






//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>

//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>

//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>

//                                                                         <tr>
//                                                                             <td>
//                                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" style="table-layout:fixed">
//                                                                                     <tbody>
//                                                                                         <tr>
//                                                                                             <td colspan="2" style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:16px;font-weight:bold;height:10px">
//                                                                                             </td>
//                                                                                         </tr>



//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Tổng
//                                                                                                 tiền:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">
//                                                                                                 ₫89,000
//                                                                                             </td>
//                                                                                         </tr>


//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Voucher
//                                                                                                 từ Shop:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">₫8,900
//                                                                                             </td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Mã giảm
//                                                                                                 giá của Shop:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">
//                                                                                                 SVC-698774922985520
//                                                                                             </td>
//                                                                                         </tr>


//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Phí vận
//                                                                                                 chuyển:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">₫0
//                                                                                             </td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">Tổng
//                                                                                                 thanh toán:
//                                                                                             </td>
//                                                                                             <td style="word-break:break-word;text-align:left;font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;vertical-align:top" width="49%">₫80,100
//                                                                                             </td>
//                                                                                         </tr>
//                                                                                         <tr>
//                                                                                             <td colspan="2" style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:16px;font-weight:bold;height:10px">
//                                                                                             </td>
//                                                                                         </tr>

//                                                                                         <tr>
//                                                                                             <td colspan="2" style="text-align:left;font-family:Helvetica,arial,sans-serif;color:#1f1f1f;font-size:16px;font-weight:bold;height:10px">
//                                                                                             </td>
//                                                                                         </tr>



//                                                                                     </tbody>
//                                                                                 </table>

//                                                                             </td>
//                                                                         </tr>
//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>



//                 <div style="width:100%;height:1px;display:block" align="center">
//                     <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0"></div>
//                 </div>





//                 <table width="100%" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" id="m_-8227656058511133222backgroundTable">
//                     <tbody>
//                         <tr>
//                             <td>
//                                 <table width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                     <tbody>
//                                         <tr>
//                                             <td width="100%">
//                                                 <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center">
//                                                     <tbody>

//                                                         <tr>
//                                                             <td height="10" style="font-size:1px;line-height:1px">
//                                                                 &nbsp;</td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td>
//                                                                 <table width="560" align="center" cellpadding="0" cellspacing="0" border="0">
//                                                                     <tbody>
//                                                                         <tr>
//                                                                             <td style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left;line-height:18px">
//                                                                                 <br>
//                                                                                 Trân trọng,<br>
//                                                                                 Đội ngũ Autosmart
//                                                                             </td>
//                                                                         </tr>


//                                                                         <tr>
//                                                                             <td style="font-family:Helvetica,arial,sans-serif;font-size:13px;color:#000000;text-align:left;line-height:18px">
//                                                                                 <br>
//                                                                                 Bạn có thắc mắc? Liên hệ chúng tôi <a href="https://help.shopee.vn/vn/s/contactusform" style="text-decoration:underline!important;color:#ff5722" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://help.shopee.vn/vn/s/contactusform&amp;source=gmail&amp;ust=1697988775359000&amp;usg=AOvVaw1DzYrfZ6YZ6_dJ6-d8qlxy">tại
//                                                                                     đây</a>.
//                                                                             </td>
//                                                                         </tr>


//                                                                     </tbody>
//                                                                 </table>
//                                                             </td>
//                                                         </tr>
//                                                         <tr>
//                                                             <td width="100%" height="1" bgcolor="#ffffff" style="font-size:1px;line-height:1px">&nbsp;</td>
//                                                         </tr>
//                                                     </tbody>
//                                                 </table>
//                                             </td>
//                                         </tr>
//                                     </tbody>
//                                 </table>
//                             </td>
//                         </tr>
//                     </tbody>
//                 </table>





//                 <div style="width:100%;height:5px;display:block" align="center">
//                     <div style="width:100%;max-width:600px;height:1px;border-top:1px solid #e0e0e0">
//                     </div>
//                 </div>






//                 <div style="white-space:nowrap!important;line-height:0;color:#ffffff">
//                     - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                     - - -
//                 </div>
//                 <img width="1px" height="1px" alt="" src="https://ci4.googleusercontent.com/proxy/e4Zq7fT3gaYMTdJp8D-H_uriSBxk92bgOInJ5My-fyjUNmFtt8vWNwHL_TW-rMD0_yrKZlz9IXkoOKCx0lIy3V9QorwSN8CG42WfWBU-Pq3n0k-Wj-AOnn6y34K303I5KHQQ1LyAV_dVG-_jJ5x0OFm90ClJQu53gahHz_Y0Kr2Z26QP8IIC0BpcdtpOnGePA801zL5QsiGAirak_h28fAf3o3bqiY1hFHFW6X65yQRsA2FMA-5LSsGi9uykv4TQFL-ZnFTbbP056Jid9Hx9gJJdgXKQ8zjwUlDQUX_g4ogeioUTTBlmtxuncDTiWjJ13nyZSCn_n3or2ULXDjxxHcO0utuw_CLykCVVePkJhguAOGP6E0I_NOeV7CzX6Czd3G3TLM_ildldWQbirYwXjvdlFnQ0HP0=s0-d-e1-ft#https://email.mail.shopee.vn/o/eJxMjcFyhSAMAL_meYuTAAly4GMUolJRO9La1359Z14vPe_Obo6Gp6SsnUaSIBaNONOtkWRmN7owi3g7o_JsbJKcaRAakMeu_PPRWmuEiHv2PQci5kGsJR-8EKN_OCQEsgQhAHmBVBvUn4Hdek19W8931f2cStU-nXt3xfuzlmOlAb3Z6OFw2cdSX-wJe1tgGT_0a_yGkmPa8plSOYJpyfuNbnxboJZbuyc0PbJesRzz-XD4avzN-vv4DQAA__-_pEmc" class="CToWUd" data-bit="iit" jslog="138226; u014N:xr6bB; 53:WzAsMl0.">
//             </div>
//             <div class="yj6qo"></div>
//             <div class="adL">


//             </div>
//         </div>
//     </div>
//     <div id=":49o" class="ii gt" style="display:none">
//         <div id=":49n" class="a3s aiL "></div>
//     </div>
//     <div class="hi"></div>
//     <div class="WhmR8e" data-hash="0"></div>
// </div>`;
//     echo $string;
// }
// $sql222 = db_fetch_row("SELECT * FROM `tb_orders` WHERE `id` = 136");
// show_array($sql222);
// $fullname = $sql['fullname'];
// $time = $sql['time'];
// $order_code = $sql['order_code'];
// $list_products = json_decode($sql['order_buy'], true);
// echo content_mail($fullname, $time, $order_code, $list_products);
// content_mail($fullname, $time, $order_code, $list_products);

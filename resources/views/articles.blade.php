
@extends('layout.master')

@section('title', $title)

@section('css_link')
    <link href="http://fonts.googleapis.com/css?family=Raleway:700,300" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="/css/doc.css">
    <link rel="stylesheet" href="/css/prettify.css">
    <link href="/js/guidely/guidely.css" rel="stylesheet">
    <script type="text/javascript" src="/js/jquery2.min.js"></script>

    <style>
        .scrollToTop{
            background:#FFCC33;
            width:60px;
            height:60px;
            text-align:center;
            position:fixed;
            bottom:60px;
            right:50px;
            display:none;
            z-index: 99;
            border-radius:100%;
            -webkit-border-radius:100%;
            -moz-border-radius:100%;
        }
        .scrollToTop:hover{ text-decoration:none; opacity:0.8;}
        .scrollToTop .scrollarrow {width: 0; height: 0; border-style: solid; border-width: 0 10px 15px 10px; border-color: transparent transparent #303030; display: block; margin:20px auto 0;}
        .location{
            color:#af613cd6;
        }
    </style>


@endsection

@section('content')
    <div class="wrapper" id="myAnchor" style="background-color: ghostwhite;">

        <div class="main-inner">

            <div class="container">

                <div class="row">



                    <section>
                        <section class="content content-light">
                            <div class="container">
                                <!--************************側邊欄 目錄 href 對應下面內容的id****************************************-->
                                <ul class="docs-nav">
                                    <li><strong>系統簡介</strong>
                                        <div id="target-1" class="widget">
                                        </div>
                                    </li>
                                    <li><a href="#Preface" class="cc-active">前言</a></li>
                                    <li><a href="#benefits" class="cc-active">應用價值</a></li>
                                    <li class="separator"></li>
                                    <li><strong>案例說明</strong></li>
                                    <li><a href="#document" class="cc-active">SFT完整架構</a></li>
                                    <li><a href="#bom" class="cc-active">BOM表</a></li>
                                    <li class="separator"></li>
                                    <li><strong>ERP 前置基本資料</strong></li>
                                    <li><a href="#erp_step1" class="cc-active">步驟1 - 共用參數設定</a></li>
                                    <li><a href="#erp_step2" class="cc-active">步驟2 - 幣別匯率建立</a></li>
                                    <li><a href="#erp_step3" class="cc-active">步驟3 - 生產線資料建立</a></li>
                                    <li><a href="#erp_step4" class="cc-active">步驟4 - 製程代號建立</a></li>
                                    <li><a href="#erp_step5" class="cc-active">步驟5 - 品號類別資料建立</a></li>
                                    <li><a href="#erp_step6" class="cc-active">步驟6 - 品號資料建立</a></li>
                                    <li><a href="#erp_step7" class="cc-active">步驟7 - 產品途程資料建立</a></li>
                                    <li class="separator"></li>
                                    <li><strong> SFT 操作流程</strong></li>
                                    <li><a href="#sft_step1" class="cc-active">步驟1 - ERP基本資料匯入</a></li>
                                    <li><a href="#sft_step2" class="cc-active">步驟2 - ERP製程建立作業匯入</a></li>
                                    <li><a href="#sft_step3" class="cc-active">步驟3 - 訂單/製令資料匯入作業</a></li>
                                    <li><a href="#sft_step4" class="cc-active">步驟4 - 製令發放</a></li>
                                    <li><a href="#sft_step5" class="cc-active">步驟5 - ERP移轉單轉為領料單</a></li>
                                    <li><a href="#sft_step6" class="cc-active">步驟6 - 線上派工</a></li>
                                    <li><a href="#sft_step7" class="cc-active">步驟7 - 派工執行看板(進站)</a></li>
                                    <li><a href="#sft_step8" class="cc-active">步驟8 - 派工執行看板(出站)</a></li>

                                </ul>
                                <!--************************側邊欄 end*******************************************************************-->

                                    <div id="target-2" class="widget">

                                        <div class="widget-content">

                                        </div> <!-- /widget-content -->

                                    </div> <!-- /widget -->




                                    <div class="widget">

                                        <div class="widget-content">

                                        </div> <!-- /widget-content -->

                                    </div> <!-- /widget -->





                                <div class="docs-content">
                                    <div id="target-4" class="widget">
                                    </div>
                                    <!--************************內容開始(側邊欄對應內容的id)****************************************-->
                                    <h2>系統簡介</h2>
                                    <hr>

                                    <!--     前言     -->
                                    <h3 id="Preface"> # 前言</h3>

                                    <p> 你知道SFT這套系統的功用嗎?</p>
                                    <p> SFT可以簡單定義為企業的「即時生產資訊追蹤系統」，提供企業自接單、投料、製造、外包、至完工入庫，
                                        全程掌握生產資訊，藉以緊密串接現場製程與ERP作業，落實企業管理循環。其簡介如下:</p>
                                    <ul>
                                        <li>Java技術，提供Web介面，簡化系統資源與使用，管理無距離。</li>
                                        <li>與Workflow ERP緊密整合，減少錯誤 及避免重工。</li>
                                        <li>生產現場異常監控，問題可即時反應。</li>
                                        <li>生產現場資訊即時回饋並追蹤。</li>
                                    </ul>
                                    <p>企業成功案例中，透過資訊化系統使製造現場即時透明，掌控調度及改善管理事半功倍；
                                        SFT系統讓生產進度透明化，可即時掌控良品數量、生產工時及完工比率，目前訂單達交率及入庫準時度更提高到80%、提升訂單達交速度，
                                        同時滿足訂單如期達交及降低庫存的高挑戰、使用SFT系統檢視營運細節，即時警示生產異常狀態。更多客戶應用價值。 </p>


                                    <h3 id="benefits"> # 應用價值</h3>

                                    <ul>
                                        <li style="color: brown;">邁向工業 4.0 製造現場管理解決方案。</li>
                                        <li style="color: brown;">穩建邁向智慧工廠，提升智造競爭力。</li>
                                        <li style="color: brown;">工廠管理第一步 現場透明化。</li>
                                    </ul>

                                    <p>

                                        <!--     前言end     -->

                                    <br>
                                    <!--     案例說明     -->
                                    <h2>案例說明</h2>
                                    <hr>
                                    <!--     案例說明end     -->

                                    <!--     文件 (算是蛋黃酥案例的一些前言，介紹一下大概在幹嘛)    -->
                                    <h3 id="document"> # SFT完整架構 </h3>
                                    <p><img src="img/sft26.jpg" alt=""></p>
                                    <!--     文件end     -->

                                    <!--     BOM表     -->
                                    <h3 id="bom"> # BOM表</h3>
                                    <p>以下為蛋黃酥案例的BOM表:</p>

                                    <img src="img/BOM.png" alt="">
                                    <h2> </h2>

                                    <ul>
                                        <li>成品: 禮盒 </li>
                                        <li>半成品: 油酥、油皮、內餡、蛋黃酥</li>
                                        <li>原料:紅豆泥、蛋黃、糖、中筋麵粉、奶油、低筋麵粉 </li>
                                        <li>物料:紙盒、乾燥劑、塑膠袋、 </li>
                                    </ul>
                                    <p>介紹內容</p>
                                    <p>  <img src="img/abc.png" alt=""></p>
                                    <!--     BOM表 end     -->

                                    <br>
                                    <!--     ERP 前置基本資料     -->
                                    <h2>ERP 前置基本資料</h2>
                                    <hr>
                                    <!--     ERP 前置基本資料end     -->

                                    <h3 id="erp_step1"> # 步驟1 - 共用參數設定</h3>
                                    <p>財務參數設定目的:設定與管理財務模組相關系統的帳務期間，作為日常異動作業維護的控管</p>
                                    <span class="location">作業位置->基本資料管理系統 \ 建立作業 \ 進銷存參數設定作業 and 財務參數設定                                  </span>
                                    <p><img src="img/a.png" alt="">
                                        <img src="img/b.png" alt=""></p>
                                    <p>重點說明:「庫存現行年月」是指目前庫存帳尚未結帳的年月時點，該年月(含)之後的相關庫存異動單可以執行新增、修改及確認(不考慮帳務凍結日之前提)。</p>
                                    <p> 庫存現行年月請由系統「月底存貨結轉作業」自動更新，切勿手動修改，否則將導致庫存資料錯亂，請特別謹慎處理。                                  	  </p>
                                    <p>「庫存關帳年月」通常運用於經會計師審查異動憑證確認的年月時點；在該年月(含)之
                                        前的相關庫存異動單據是不可以有任何的新增及確認等異動。「帳務凍結日期」一般是用於庫存系統進行月底結帳程序前，設定帳務凍結日將現行年月的最後一天(含)以前的單據凍結，即影響庫存的相關單據均無法確認或取消確認，以確保結算庫存及成本的正確性</p>
                                    <br>

                                    <h3 id="erp_step2"> # 步驟2 - 幣別匯率建立</h3>
                                    <p>目的:設定交易活動往來所使用的幣別、價格金額取位及匯率，作為日常異動單據使用的依據</p>
                                    <span class="location">作業位置-&gt;基本資料管理系統 \ 建立作業 \ 幣別匯率建立作業                                  </span>

                                    <p> <img src="img/c.png" alt=""></p>	<p>重點說明: </p>
                                    <p>1.本作業單頭須設定交易幣別代號及單價、金額之小數取位，當異動單據使用此幣別時，  其單價、金額欄位會依設定的小數位數以四捨五入後的數值呈現。</p>
                                    <p>2.作業單身預設該幣別常用匯率，分為銀行買進、賣出或報關買進、賣出匯率四大類。</p>
                                    <p> 3. 後續日常異動單據之匯率，系統會依「單據性質設定作業」之「匯率來源」的設定，作為預設匯率。 </p>
                                    <br>

                                    <h3 id="erp_step3"> # 步驟3 - 生產線資料建立</h3>
                                    <p>目的:設定生產線基本資料，後續可蒐集生產線相關生產工時做為費用分攤依據，並可依生產線分析生產效率及產能狀況</p>
                                    <span class="location">作業位置->基本資料管理系統 \ 建立作業 \ 生產線資料建立作業  </span>
                                    <p><img src="img/d.png" alt="">
                                        <img src="img/e.png" alt="">
                                        <img src="img/f.png" alt=""></p>

                                    <br>
                                    <h3 id="erp_step4"> # 步驟4 - 製程代號建立</h3>
                                    <p>目的:建立生產線上每一道加工製造的程序，作為後續生產製造相關作也使用。</p>
                                    <p class="location">作業位置->基本資料管理系統 \ 建立作業 \ 製程代號建立作業</span>
                                    <p><img src="img/g.png" alt=""></p>
                                    <p>重點說明:</p>
                                    <p>1. 設定每一道加工程序的代號及名稱並簡述製程主要工作，以供生產模組之作業使用。</p>
                                    <p> 2. 預設本道製程的加工性質，並依其性質設定所屬生產線別或外包廠商</p>
                                    <br>

                                    <h3 id="erp_step5"> #步驟5 - 品號類別資料建立</h3>
                                    <p>目的:於「進銷存參數設定作業」中依各公司實際需求設定不同存貨之分類方式後，在本作業建立各種分類方式所對應的品號類別，利於後續品號建立及各項統計分析報表之運用。</p>
                                    <p class="location">作業位置->庫存管理系統 \ 基本資料管理 \ 品號類別資料建立作業</span>

                                    <p><img src="img/h.png" alt=""></p>
                                    <p>重點說明:</p>
                                    <p>1. 會計單位及業務單位根據不同查詢管理品號的方式進行類別規劃，如:會計單位以存貨科目屬性(會計報表需求)來規劃分類，如:原料、物料、半成品…等；而業務單位可依產品功能特色來規劃分類，如:數位相機、單眼相機等。</p>
                                    <p> 2. 可運用報表針對某一種或數種類別來進行存貨資訊的查詢、彙總、統計，如:庫存明細表、進耗存統計表…等。 </p>
                                    <br>

                                    <h3 id="erp_step6"> #步驟6 - 品號資料建立</h3>
                                    <p>目的:舉凡企業銷售、進貨及生產製造所用到的原物料或成品，在進行各項交易活動(如進
                                        貨、銷貨…等)或建立 BOM 前頇先在此作業建立品號資料，才能進行後續進銷存或生產等作業。</p>
                                    <p class="location">作業位置->庫存管理系統 \ 基本資料管理 \ 品號資料建立作業</span>
                                    <p><img src="img/i.png" alt=""></p>
                                    <p>重點說明:</p>
                                    <p>1. 「品號」根據各公司之編碼原則來編製料件編號「品名」及「規格」用來描述該料件的名稱、尺寸、規格、特性…等各項說明資訊。</p>
                                    <p>2.「庫存數量」、「庫存金額」及「單位成本」是記錄現有的存貨倉總庫存狀況。意即單身各庫數量及金額之總和，(庫別性質為「非存貨倉」之庫存量不納入計算)。  </p>
                                    <p> 「單位成本」為系統取得即時之「庫存金額」／「庫存數量」計算所得。  </p>
                                    <p>3. 品號類別欄位最多可設定該品項四種不同分類方式所歸屬的類別代號，如:「會計-商品」  及「業務-數位相機」。  而「主要庫別」為該品項主要存放之倉庫，為後續建立單據時預設帶出之庫別。</p>
                                    <br>

                                    <h3 id="erp_step7"> #步驟7 - 產品途程資料建立</h3>
                                    <p>目的:設定產品生產時的先後製程順序，及每道製程耗用的標準工時或機時…等，作為後續開立製令製程之預設途程。</p>
                                    <p class="location">作業位置->產品結構管理系統 \ 基本資料管理 \ 產品途程資料建立作業</span>
                                    <p><img src="img/j.png" alt="">
                                        <img src="img/k.png" alt=""></p>
                                    <p>「途程」與「製程」之差異說明如下:
                                        假設產出一 PCB Assembly 成品，需經以下五個加工程序，分別是:Axial 橫臥式元件插
                                        件、Radiah 直立式元件插件、SMT 元件黏著、過錫及測詴。一個過程為一道製程，經過五道製程可產出一個成品，則五道製程排序後即為一個途程。</p>



                                    <br>
                                    <!--     SFT 操作流程     -->
                                    <h2>SFT 操作流程</h2>
                                    <hr>
                                    <!--     SFT 操作流程end     -->

                                    <h3 id="sft_step1"> # 步驟1 - ERP基本資料匯入</h3>
                                    <p>目的:指將建立在ERP系統的相關資料如:公司、廠別、庫別、幣別、廠商稅別碼、供應商資料、生產線資料等匯入。</p>
                                    <p class="location">作業位置->ERP/SFT資料整合 \ERP轉匯SFT \ 基本資料匯入設定</span>

                                    <h3 id="sft_step2"> # 步驟2 - ERP製程建立作業匯入</h3>
                                    <p>目的:指將建立在ERP系統的品號基本資料、產品結構資料、製程資料、產品途程資料、托外加工計價資料等匯入。</p>
                                    <p class="location">作業位置->ERP/SFT資料整合 \ERP轉匯SFT \ 製程資料匯入設定</span>                                                                                                    <h3 id="sft_step3"> # 步驟3 - 訂單/製令資料匯入作業
                                    </h3>
                                    <p>目的:針對已經開立好的製令單即時轉資料至SFT系統內，來進行製令發放管理，發放後現場才可依據製程順序進行加工。</p>
                                    <p class="location">作業位置->ERP/SFT資料整合 \ERP轉匯SFT \ 訂單/製令資料資料匯入設定</span>

                                    <h3 id="sft_step4"> # 步驟4 - 製令發放</h3>
                                    <p>目的:生管人員檢視製令完成後，進行製令發放的動作，告知生產線可以準備投料上線。</p>
                                    <p class="location">作業位置->製令管理\製令發放</span>



                                    <h3 id="sft_step5"> # 步驟5 - ERP移轉單轉為領料單</h3>
                                    <p>目的:製令發放並產生「投料移轉單」後，可透過此作業自動產生領料單，以藉此通知倉管人員進行備料及領發料。</p>
                                    <p class="location">作業位置->製令管理\移轉單產生領料單</span>



                                    <h3 id="sft_step6"> #步驟6 - 線上派工</h3>
                                    <p>目的:製令發放之後，生管人員須針對派工站的各機台指定負責生產的製令及生產順序，後續現場人員可依順序進行生產(非派工站不須經此步驟)。</p>
                                    <p class="location">作業位置->製令管理\線上派工</span>


                                    <h3 id="sft_step7"> #步驟7 - 派工執行看板(進站)</h3>

                                    <p>目的:針對派工站，當生管做完「線上派工」，現場人員可在該作業依據生管人員派工的機台與生產順序來做進出站。</p>
                                    <p class="location">作業位置->派工現場工作台\製令追蹤\派工執行看板</span>



                                    <h3 id="sft_step8"> #步驟8 - 派工執行看板(出站)</h3>
                                    <p>目的:針對派工站，當生管做完「線上派工」，現場人員可在該作業依據生管人員派工的機台與生產順序來做進出站。</p>
                                    <p class="location">作業位置->派工現場工作台\製令追蹤\派工執行看板</span>


                                </div>
                            </div>
                        </section>

                    </section>


                         <a href="#" class="scrollToTop" title="Go Top"><i class="sprite scrollarrow"></i></a>


                </div>
            </div>
        </div>

    </div> <!-- end wrapper-->
@endsection


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
<script src="/js/guidely/guidely.min.js"></script>
<script type="text/javascript">
    // Scroll to top
    $(document).ready(function(){
        //Check to see if the window is top if not then display button
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollToTop').fadeIn();
            } else {
                $('.scrollToTop').fadeOut();
            }
        });
        //Click event to scroll to top
        $('.scrollToTop').click(function(){
            $('html, body').animate({scrollTop : 0},800);
            return false;
        });
    });
</script>
<script>



    $(function () {

        guidely.add ({
            attachTo: '#target-1'
            , anchor: 'top-left'
            , title: '目錄區'
            , text: '本目錄按照主題區分，透過點擊主題的方式，即可立即觀看介紹。'
        });



        guidely.add ({
            attachTo: '#target-2'
            , anchor: 'middle-middle'
            , title: '內容區'
            , text: '本區為主題的內容。'
        });



        guidely.init ({ welcome: true, startTrigger: false });


    });

</script>

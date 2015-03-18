<?php
/**
 * Template Name: wiki用, No Sidebar

 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">
	
		

<?php
if(have_posts()):
	while (have_posts()): the_post(); ?>

<h3 class="widget-title">検索</h3>

<p class="margin-bottom10">■ 科名検索</hp>
<div class="row margin-bottom20">
	
    <div class="col-md-3">
	     <ul id="termlist">
	      <li>
	        <?php if(is_tax('family_name')): ?>
	          <span><?php $taxonomy = $wp_query->get_queried_object();
	          echo esc_html($taxonomy -> name); ?></span>
	        <?php else : ?>
	          <span>科名を選択</span>
	        <?php endif; ?>
	        <div>
	          <ul>
	          <?php
	          wp_list_categories('taxonomy=family_name&orderby=term_order&title_li='); ?>
	          </ul>
	        </div>
	      </li>
	    </ul> 
<!--
	   <ul id="termlist">
	      <li>
	        <?php if(is_tax('aiueo')): ?>
	          <span><?php $taxonomy = $wp_query->get_queried_object();
	          echo esc_html($taxonomy -> name); ?></span>
	        <?php else : ?>
	          <span>最初の文字を選択</span>
	        <?php endif; ?>
	        <div>
	          <ul>
	          <?php
	          wp_list_categories('taxonomy=aiueo&orderby=term_order&title_li='); ?>
	          </ul>
	        </div>
	      </li>
	    </ul>  
-->
    </div>
    <div class="col-md-3">

    </div>
    <div class="col-md-3">
<!--
	   <ul id="termlist">
	      <li>
	        <?php if(is_tax('plants_group')): ?>
	          <span><?php $taxonomy = $wp_query->get_queried_object();
	          echo esc_html($taxonomy -> name); ?></span>
	        <?php else : ?>
	          <span>植物分類を選択</span>
	        <?php endif; ?>
	        <div>
	          <ul>
	          <?php
	          wp_list_categories('taxonomy=plants_group&orderby=term_order&title_li='); ?>
	          </ul>
	        </div>
	      </li>
	    </ul> 	 
-->   
    </div>
    <div class="col-md-3">
    </div>
</div>
<div class="row margin-bottom20">
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
</div>

<p class="margin-bottom10">■ 条件検索</p>
<div class="row margin-bottom20">
	
    <div class="col-md-3">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
<label for="s" class="assistive-text">検索</label>
<input type="text" class="field" name="s" id="s" placeholder="検索" /></div>
    <div class="col-md-3"></div>
    <div class="col-md-3">
	    <select name="water">
	        <option value="" selected>水やり</option>
	        <option value="控えめ">控えめ</option>
	        <option value="普通">普通</option>
	        <option value="多め">多め</option>
    	</select>
    </div>
    <div class="col-md-3">
	            <select name="exposure">
        <option value="" selected>日当たり</option>
        <option value="日なた">日なた</option>
        <option value="日陰">日陰</option>
        <option value="半日陰">半日陰</option>
        <option value="室内">室内</option>
    </select>
    </div>
</div>
<div class="row margin-bottom20">
    <div class="col-md-6">
	<p class="margin-bottom10">◯ 発芽適温</p>
    <select name="low">
    <option value="-99" selected>下限なし</option>
    <option value="-5">-5℃以上</option>
    <option value="0">0℃以上</option>
    <option value="5">5℃以上</option>
    <option value="10">10℃以上</option>
    <option value="15">15℃以上</option>
    <option value="20">20℃以上</option>
    <option value="25">25℃以上</option>
    <option value="30">30℃以上</option>
    <option value="35">35℃以上</option>
</select>　～
<select name="high">
    <option value="99" selected>上限なし</option>
    <option value="-5">-5℃以下</option>
    <option value="0">0℃以下</option>
    <option value="5">5℃以下</option>
    <option value="10">10℃以下</option>
    <option value="15">15℃以下</option>
    <option value="20">20℃以下</option>
    <option value="25">25℃以下</option>
    <option value="30">30℃以下</option>
    <option value="35">35℃以下</option>
</select>
    </div>
    <div class="col-md-6">
	    <p class="margin-bottom10">◯ 生育適温</p>
    <select name="G_low">
    <option value="-99" selected>下限なし</option>
    <option value="-5">-5℃以上</option>
    <option value="0">0℃以上</option>
    <option value="5">5℃以上</option>
    <option value="10">10℃以上</option>
    <option value="15">15℃以上</option>
    <option value="20">20℃以上</option>
    <option value="25">25℃以上</option>
    <option value="30">30℃以上</option>
    <option value="35">35℃以上</option>
</select>　～
<select name="G_high">
    <option value="99" selected>上限なし</option>
    <option value="-5">-5℃以下</option>
    <option value="0">0℃以下</option>
    <option value="5">5℃以下</option>
    <option value="10">10℃以下</option>
    <option value="15">15℃以下</option>
    <option value="20">20℃以下</option>
    <option value="25">25℃以下</option>
    <option value="30">30℃以下</option>
    <option value="35">35℃以下</option>
</select>

    
    </div>
    <div class="col-md-4">

    </div>

</div>
<div class="row margin-bottom20">
    <div class="col-md-3">
        <select name="form">
        <option value="" selected>形態</option>
        <option value="一年草">一年草</option>
        <option value="二年草">二年草</option>
        <option value="多年草">多年草</option>
        <option value="つる植物">つる植物</option>
        <option value="低木">低木</option>
        <option value="高木">高木</option>
        <option value="多年草、一年草">多年草、一年草</option>
    </select>
    </div>
    <div class="col-md-3">
        <select name="Cold_resistance">
        <option value="" selected>耐寒性</option>
        <option value="強い">強い</option>
        <option value="やや強い">やや強い</option>
        <option value="普通">普通</option>
        <option value="やや弱い">やや弱い</option>
        <option value="弱い">弱い</option>
    </select>
    </div>
    <div class="col-md-3">
        <select name="Heat_tolerance">
        <option value="" selected>耐暑性</option>
        <option value="強い">強い</option>
        <option value="やや強い">やや強い</option>
        <option value="普通">普通</option>
        <option value="やや弱い">やや弱い</option>
        <option value="弱い">弱い</option>
    </select>
    </div>
    <div class="col-md-3">
        <select name="difficulty">
        <option value="" selected>難易度</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>       
    </select>
    </div>
</div>
<div class="align-center">
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="検索" />
</form>
</div>
<br>
<br>

<p><!-- Nav tabs --></p>
<ul class="nav nav-tabs">
<li class="active"><a href="#a" data-toggle="tab">ア</a></li>
<li><a href="#ka" data-toggle="tab">カ</a></li>
<li><a href="#sa" data-toggle="tab">サ</a></li>
<li><a href="#ta" data-toggle="tab">タ</a></li>
<li><a href="#na" data-toggle="tab">ナ</a></li>
<li><a href="#ha" data-toggle="tab">ハ</a></li>
<li><a href="#ma" data-toggle="tab">マ</a></li>
<li><a href="#ya" data-toggle="tab">ヤ</a></li>
<li><a href="#ra" data-toggle="tab">ラ</a></li>
<li><a href="#wa" data-toggle="tab">ワ</a></li>
</ul>
<p><!-- Tab panes --></p>
<div class="tab-content wiki">
<div id="a" class="tab-pane active">
	<h5 class="list1">ア</h5>

		<?php wiki('a'); ?>

	<h5 class="list1">イ</h5>
		<?php wiki('i'); ?>
	<h5 class="list1">ウ</h5>
		<?php wiki('u'); ?>
	<h5 class="list1">エ</h5>
		<?php wiki('e'); ?>
	<h5 class="list1">オ</h5>
		<?php wiki('o'); ?>
</div>

<div id="ka" class="tab-pane">
	<h5>カ</h5>
		<?php wiki('ka'); ?>	
	<h5>キ</h5>
		<?php wiki('ki'); ?>
	<h5>ク</h5>
		<?php wiki('ku'); ?>
	<h5>ケ</h5>
		<?php wiki('ke'); ?>
	<h5>コ</h5>
		<?php wiki('ko'); ?>
</div>
<div id="sa" class="tab-pane">
	<h5>サ</h5>
		<?php wiki('sa'); ?>	
	<h5>シ</h5>
		<?php wiki('si'); ?>
	<h5>ス</h5>
		<?php wiki('su'); ?>
	<h5>セ</h5>
		<?php wiki('se'); ?>
	<h5>ソ</h5>
		<?php wiki('so'); ?>
</div>
<div id="ta" class="tab-pane">
	<h5>タ</h5>
		<?php wiki('ta'); ?>	
	<h5>チ</h5>
		<?php wiki('ti'); ?>
	<h5>ツ</h5>
		<?php wiki('tu'); ?>
	<h5>テ</h5>
		<?php wiki('te'); ?>
	<h5>ト</h5>
		<?php wiki('to'); ?></div>
<div id="na" class="tab-pane">
	<h5>ナ</h5>
		<?php wiki('na'); ?>	
	<h5>ニ</h5>
		<?php wiki('ni'); ?>
	<h5>ヌ</h5>
		<?php wiki('nu'); ?>
	<h5>ネ</h5>
		<?php wiki('ne'); ?>
	<h5>ノ</h5>
		<?php wiki('no'); ?>
</div>
<div id="ha" class="tab-pane">
	<h5>ハ</h5>
		<?php wiki('ha'); ?>	
	<h5>ヒ</h5>
		<?php wiki('hi'); ?>
	<h5>フ</h5>
		<?php wiki('hu'); ?>
	<h5>ヘ</h5>
		<?php wiki('he'); ?>
	<h5>ホ</h5>
		<?php wiki('ho'); ?>
</div>
<div id="ma" class="tab-pane">
	<h5>マ</h5>
		<?php wiki('ma'); ?>	
	<h5>ミ</h5>
		<?php wiki('mi'); ?>
	<h5>ム</h5>
		<?php wiki('mu'); ?>
	<h5>メ</h5>
		<?php wiki('me'); ?>
	<h5>モ</h5>
		<?php wiki('mo'); ?>
</div>
<div id="ya" class="tab-pane">
	<h5>ヤ</h5>
		<?php wiki('ya'); ?>	
	<h5>ユ</h5>
		<?php wiki('yu'); ?>
	<h5>ヨ</h5>
		<?php wiki('yo'); ?>
</div>
<div id="ra" class="tab-pane">
	<h5>ラ</h5>
		<?php wiki('ra'); ?>	
	<h5>リ</h5>
		<?php wiki('ri'); ?>
	<h5>ル</h5>
		<?php wiki('ru'); ?>
	<h5>レ</h5>
		<?php wiki('re'); ?>
	<h5>ロ</h5>
		<?php wiki('ro'); ?>
</div>
<div id="wa" class="tab-pane">
	<h5>ワ</h5>
		<?php wiki('wa'); ?>
</div>
</div>


<?php endwhile;
	endif; ?>


	 
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
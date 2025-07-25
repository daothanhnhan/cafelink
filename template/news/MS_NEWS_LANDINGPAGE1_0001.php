<?php

    $news_home = new action_news();

    $list_news_home = $news_home->getListNewsNew_hasLimit(3);

?>



<div class="Center-Width">

    <div class="container">

        <div class="Infor-Width"> 

            <div class="row">

                <div class="col-md-6">

                    <div class="colNews">

                        <h3 class="titleColNews">Bảng Tin Digital Marketing Online</h3>

                        <ul class="listNews Section-Animate">

                            <?php

                                foreach ($list_news_home as $item) {

                                    $date = date('d-M-Y', strtotime($item['news_created_date']));

                                    $day = substr($date, 0, 2);

                                    $month = substr($date, 3, 3);

                            ?>

                                <li class="Area-Animation-News AnimationNews1 clearfix">

                                    <div class="leftNews">

                                        <p class="dateNews"><?php echo $day;?></p><br /><span class="monthNews"><?php echo $month ;?></span>

                                    </div>

                                    <div class="rightNews">

                                        <div class="sub-title clearfix">

                                            <p class="subNews"><i class="fa fa-user" aria-hidden="true"></i> admin</p>

                                            <p class="moreNews">Chuyên Mục: <a href="/tin-tuc" class="catNews">Tin tức</a></p>

                                        </div>

                                        <a href="#" class="catNews"><?php?></a>

                                        <a href="/<?= $item['friendly_url'] ?>" class="nameNews" title=""><?php echo $item['news_name'];?></a>

                                    </div>

                                </li>

                            <?php } ?>

                        </ul>

                    </div>

                </div>

                <div class="col-md-6">

                     <div class="colMXH">

                        <h3 class="titleColNews">Theo dõi chúng tôi trên Facebook</h3>

                        <div class="pageFBHome">
 <div class="fb-page" data-href="https://www.facebook.com/cafelinkvietnam/" data-tabs="timeline" data-width="500" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/cafelinkvietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/cafelinkvietnam/">CAFE LINK VIỆT NAM</a></blockquote></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


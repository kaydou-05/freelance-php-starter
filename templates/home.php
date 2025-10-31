<?php require __DIR__ . '/layout.php'; ?>
<section class="card">
    <h1>مرحباً في منصة الفريلانس</h1>
    <p>إحصائيات المنصة:</p>
    <ul>
        <li>مستقلون: <?php echo number_format($stats['freelancers']); ?></li>
        <li>مشاريع: <?php echo number_format($stats['projects']); ?></li>
        <li>تصنيفات: <?php echo number_format($stats['categories']); ?></li>
    </ul>
    <form action="/services" method="get" style="margin-top:12px;">
        <input name="q" placeholder="ابحث عن خدمة..." style="padding:8px; width:60%" />
        <button type="submit" style="padding:8px">بحث</button>
    </form>
</section>
<?php require __DIR__ . '/footer.php'; ?>

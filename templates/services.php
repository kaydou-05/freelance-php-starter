<?php require __DIR__ . '/layout.php'; ?>
<section class="card">
    <h2>نتائج البحث</h2>
    <div style="margin-top:12px;">
        <?php if (empty($services)): ?>
            <div>لا توجد خدمات مطابقة</div>
        <?php else: ?>
            <div class="grid">
                <?php foreach ($services as $s): ?>
                    <div class="card">
                        <div><strong><?php echo htmlspecialchars($s['title']); ?></strong></div>
                        <div style="font-size:13px;color:#6b7280"><?php echo htmlspecialchars($s['category']); ?> • <?php echo htmlspecialchars($s['freelancer_name'] ?? 'مستقل'); ?></div>
                        <div style="margin-top:8px;"><?php echo htmlspecialchars($s['description']); ?></div>
                        <div style="margin-top:8px; font-weight:bold;">$<?php echo $s['price']; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php require __DIR__ . '/footer.php'; ?>

Freelance PHP Starter
=====================

محتوى الحزمة:
- مشروع PHP بسيط (PSR-4) مع PDO وملفات عرض بسيطة (RTL-ready).
- يمكن تشغيله عبر PHP built-in server لاختبار الواجهات.

تشغيل محلي سريع:
1. فك الضغط.
2. انسخ .env.example إلى .env وحرّر بيانات قاعدة البيانات.
3. إنشاء قاعدة بيانات MySQL باسم `freelance` أو عدّل في .env.
4. استورد sql/schema.sql و sql/seeds.sql في قاعدة البيانات.
5. ثبت الحزم (يتطلب composer):
   composer install
6. شغّل الخادم المدمج من مجلد public:
   php -S localhost:8000 -t public
7. افتح http://localhost:8000

ملاحظات:
- هذا مشروع بداية (starter). يمكن توسيعه بإضافة نظام تسجيل/جلسات، رفع ملفات، بوابة دفع، وواجهة إدارة متقدمة.
- الملفات موجودة تحت src/ ، القوالب تحت templates/ ويمكن استبدالها بـ Twig لاحقًا.

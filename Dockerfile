# Use official PHP image with Apache, PHP 8.1 (أو اختر إصدارك)
FROM php:8.1-apache

# Enable Apache mod_rewrite (إذا تحتاجه)
RUN a2enmod rewrite

# تثبيت امتدادات PHP المطلوبة (مثل pdo_mysql) وتحديث الـ packages
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# إعداد مجلد العمل
WORKDIR /var/www/html

# نسخ ملفات المشروع إلى حاوية Docker
COPY . /var/www/html

# نسخ ملف .env إذا موجود (أو يمكنك استخدام متغيرات بيئة عبر Render لاحقاً)
# تأكد أنك قمت بإعداد .env أو استخدم الافتراضي
# RUN cp .env.example .env

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# تشغيل Composer install
RUN composer install --no-dev --optimize-autoloader

# إعداد صلاحيات المجلدات إذا تحتاج (مثلاً مجلد تخزين)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port if needed (عادة Apache يشتغل على 80)
EXPOSE 80

# Command to run Apache in foreground (already default in php:*-apache)
CMD ["apache2-foreground"]

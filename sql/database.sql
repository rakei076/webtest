-- 创建数据库
CREATE DATABASE IF NOT EXISTS photo;
USE photo;

-- 创建照片表
CREATE TABLE IF NOT EXISTS photo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    title VARCHAR(100) NOT NULL,
    location VARCHAR(100),
    description TEXT,
    photo VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 插入测试数据
INSERT INTO photo (filename, title, location, description, photo) VALUES
('DSC07511.JPG', '東京', '東京都', 'アジアの第一大都市', 'uploads/DSC07511.JPG'),
('DSC07380.JPG', '横浜', '横浜', '最も住み休み都市', 'uploads/DSC07380.JPG'); 
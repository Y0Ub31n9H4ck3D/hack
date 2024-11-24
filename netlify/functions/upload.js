const fs = require('fs');
const path = require('path');
const formData = require('form-data');
const axios = require('axios');

exports.handler = async (event, context) => {
    const form = new formData();
    const filePath = path.join(__dirname, 'uploads/screenshot.png');  // Ganti dengan path file screenshot yang akan diupload
    
    form.append('fileToUpload', fs.createReadStream(filePath));

    try {
        const response = await axios.post('https://yourserver.com/upload.php', form, {
            headers: {
                ...form.getHeaders()
            }
        });

        return {
            statusCode: 200,
            body: JSON.stringify({ message: 'File uploaded successfully!' })
        };
    } catch (error) {
        return {
            statusCode: 500,
            body: JSON.stringify({ message: 'Failed to upload file', error: error.message })
        };
    }
};

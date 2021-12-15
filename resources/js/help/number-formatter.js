const format = (num, separator = ' ', separator2 = null) => {
    if (!num) {return 0}

    if (!separator2) {
        separator2 = separator;
    }

    const str = String(num);
    const parts = str.split('.');
    parts[0] = parts[0].replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1' + separator);
    if (parts[1]) {
        parts[1] = parts[1].replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1' + separator2);
    }

    return parts.join('.');
};

export default format;
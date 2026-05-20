{{-- Floating WhatsApp Button --}}
<div class="whatsapp-float">
    <a href="https://wa.me/6283182348544?text=Halo%20ASIATUR%2C%20saya%20ingin%20bertanya%20tentang%20paket%20wisata%20atau%20umroh."
        target="_blank" rel="noopener noreferrer" class="whatsapp-btn" aria-label="Hubungi kami via WhatsApp">
        <div class="whatsapp-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="28" height="28">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.372a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
        </div>
        <span class="whatsapp-pulse"></span>
    </a>
    <div class="whatsapp-badge">
        <span>Hubungi Kami</span>
    </div>
</div>

<style>
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
    }

    .whatsapp-btn {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #25D366, #128C7E);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
        transition: all 0.3s ease;
        position: relative;
        text-decoration: none;
        color: white;
    }

    .whatsapp-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
        color: white;
        text-decoration: none;
    }

    .whatsapp-btn:active {
        transform: translateY(-1px) scale(0.98);
    }

    .whatsapp-icon {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .whatsapp-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, #25D366, #128C7E);
        animation: pulse 2s infinite;
        z-index: 1;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.3);
            opacity: 0.7;
        }

        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    .whatsapp-badge {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
        padding: 8px 16px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);
        white-space: nowrap;
        animation: slideIn 0.5s ease;
        position: relative;
    }

    .whatsapp-badge::after {
        content: '';
        position: absolute;
        bottom: -8px;
        right: 20px;
        width: 0;
        height: 0;
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-top: 8px solid #dc2626;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .whatsapp-float {
            bottom: 15px;
            right: 15px;
        }

        .whatsapp-btn {
            width: 56px;
            height: 56px;
        }

        .whatsapp-badge {
            font-size: 12px;
            padding: 6px 12px;
        }

        .whatsapp-badge span {
            display: none;
        }

        .whatsapp-badge::before {
            content: '💬';
            font-size: 16px;
        }
    }

    /* Hide badge on very small screens */
    @media (max-width: 480px) {
        .whatsapp-badge {
            display: none;
        }
    }

    /* Ensure button is always visible */
    @media print {
        .whatsapp-float {
            display: none !important;
        }
    }
</style>

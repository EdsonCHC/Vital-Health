document.addEventListener("DOMContentLoaded", function () {
    const chatbox = document.getElementById("chatbox");
    const chatContainer = document.getElementById("chat-container");
    const userInput = document.getElementById("user-input");
    const sendButton = document.getElementById("send-button");
    const openChatButton = document.getElementById("open-chat");
    const closeChatButton = document.getElementById("close-chat");
    const menuContainer = document.getElementById("menu-container");

    let isChatboxOpen = false;
    let isMenuVisible = false;
    let flag = true;
    function toggleChatbox() {
        chatContainer.classList.toggle("hidden");
        isChatboxOpen = !isChatboxOpen;
        if (flag) {
            addMessage("bot", "¡Hola! ¿Cómo puedo ayudarte hoy?");
            addMessage("bot", "Escribe Menu para abrir el menu de preguntas frecuentes");
        }
        flag = false;
    }

    openChatButton.addEventListener("click", toggleChatbox);
    closeChatButton.addEventListener("click", toggleChatbox);

    sendButton.addEventListener("click", function (e) {
        e.preventDefault();
        const userMessage = userInput.value.trim();
        if (userMessage) {
            addMessage("user", userMessage);
            userInput.value = "";
            processMessage(userMessage);
        }
    });

    userInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            sendButton.click();
        }
    });

    function addMessage(sender, text) {
        const messageElement = document.createElement("div");
        messageElement.classList.add("mb-2");
        if (sender === "user") {
            messageElement.classList.add("text-right");
        }
        const messageContent = document.createElement("p");
        messageContent.classList.add(
            "rounded-lg",
            "py-2",
            "px-4",
            "inline-block"
        );
        messageContent.textContent = text;
        if (sender === "user") {
            messageContent.classList.add("bg-vh-green", "text-white");
        } else {
            messageContent.classList.add("bg-gray-200", "text-gray-700");
        }
        messageElement.appendChild(messageContent);
        chatbox.appendChild(messageElement);
        chatbox.scrollTop = chatbox.scrollHeight; // Desplazar hacia abajo
    }

    function showMenu() {
        const options = [
            { text: "Horarios de Atención", value: "horarios" },
            { text: "Cómo Agendar una Cita", value: "cita" },
            { text: "Urgencias", value: "urgencias" },
            {
                text: "Medidas de Seguridad Sanitaria",
                value: "seguridad sanitaria",
            },
            { text: "Contacto", value: "contacto" },
            { text: "Resultados de Exámenes", value: "resultados de examen" },
            { text: "Precios y Costos", value: "precios" },
            { text: "Personal Médico", value: "personal médico" },
            { text: "Recetas y Prescripción", value: "recetas" },
            { text: "Farmacia", value: "farmacia" },
            {
                text: "Acceso a Historia Clínica",
                value: "acceso a historia clínica",
            },
            { text: "Asistencia en Línea", value: "asistencia en línea" },
        ];

        menuContainer.innerHTML = ""; // Limpiar el menú existente
        options.forEach((option) => {
            const button = document.createElement("button");
            button.classList.add(
                "bg-vh-green",
                "text-white",
                "py-2",
                "px-4",
                "rounded-md",
                "mb-2",
                "hover:bg-vh-greentransition",
                "transition",
                "duration-300"
            );
            button.textContent = option.text;
            button.addEventListener("click", () =>
                processMenuOption(option.value)
            );
            menuContainer.appendChild(button);
        });

        const closeMenuButton = document.createElement("button");
        closeMenuButton.classList.add(
            "bg-red-500",
            "text-white",
            "py-2",
            "px-4",
            "rounded-md",
            "hover:bg-red-600",
            "transition",
            "duration-300"
        );
        closeMenuButton.textContent = "Cerrar Menú";
        closeMenuButton.addEventListener("click", () => {
            menuContainer.classList.add("hidden");
            isMenuVisible = false;
        });
        menuContainer.appendChild(closeMenuButton);

        menuContainer.classList.remove("hidden");
        isMenuVisible = true;
    }

    function processMenuOption(option) {
        menuContainer.classList.add("hidden");
        isMenuVisible = false;
        switch (option) {
            case "horarios":
                addMessage(
                    "bot",
                    "Nuestros horarios son de lunes a viernes de 8:00 AM a 6:00 PM y sábados de 9:00 AM a 2:00 PM."
                );
                break;
            case "cita":
                addMessage(
                    "bot",
                    "Para agendar una cita, por favor llama al (123) 456-7890 o visita nuestra página web."
                );
                break;
            case "urgencias":
                addMessage(
                    "bot",
                    "Las urgencias están disponibles las 24 horas, los 7 días de la semana."
                );
                break;
            case "seguridad sanitaria":
                addMessage(
                    "bot",
                    'Estamos tomando diversas medidas para garantizar la seguridad sanitaria, incluyendo desinfección frecuente, uso de equipos de protección personal, y protocolos de distanciamiento social. Para más detalles, visita nuestra página de "Medidas de Seguridad" en nuestra web.'
                );
                break;
            case "contacto":
                addMessage(
                    "bot",
                    "Puedes contactarnos al (123) 456-7890 o enviarnos un correo a contacto@clinicamedica.com."
                );
                break;
            case "resultados de examen":
                addMessage(
                    "bot",
                    "Para consultar los resultados de tus exámenes, por favor accede a nuestra plataforma en línea o visita nuestra recepción."
                );
                break;
            case "precios":
                addMessage(
                    "bot",
                    "Los precios de nuestros servicios varían según el tipo de consulta y tratamiento. Puedes consultar nuestra lista de precios en nuestra página web o contactarnos directamente."
                );
                break;
            case "personal médico":
                addMessage(
                    "bot",
                    'Nuestro equipo médico está compuesto por profesionales altamente capacitados en diversas especialidades. Puedes conocer más sobre nuestro personal en la sección "Sobre Nosotros" en nuestra página web.'
                );
                break;
            case "recetas":
                addMessage(
                    "bot",
                    "Si necesitas una receta o prescripción, por favor consulta a tu médico durante tu visita. También puedes solicitar una copia de tu receta a través de nuestra plataforma en línea."
                );
                break;
            case "farmacia":
                addMessage(
                    "bot",
                    "Nuestra farmacia está ubicada en el primer piso del edificio. Ofrecemos una amplia gama de medicamentos y productos de salud."
                );
                break;
            case "acceso a historia clínica":
                addMessage(
                    "bot",
                    "Puedes acceder a tu historia clínica a través de nuestra plataforma en línea. Si tienes problemas para acceder, contacta a nuestro soporte técnico."
                );
                break;
            case "asistencia en línea":
                addMessage(
                    "bot",
                    "Ofrecemos asistencia en línea a través de nuestra página web. Si necesitas ayuda, puedes iniciar un chat en línea o enviar un correo a soporte@clinicamedica.com."
                );
                break;
            default:
                addMessage(
                    "bot",
                    "Lo siento, no entendí tu selección. Por favor, intenta seleccionar una opción del menú."
                );
                break;
        }
    }

    function processMessage(message) {
        const lowerCaseMessage = message.toLowerCase();

        if (
            lowerCaseMessage.includes("ayuda") ||
            lowerCaseMessage.includes("menu")
        ) {
            showMenu();
        } else {
            const rules = [
                {
                    pattern: /hola|buenos días|buenas tardes|buenas noches/,
                    response: "¡Hola! ¿Cómo puedo ayudarte hoy?",
                },
                {
                    pattern: /adiós|hasta luego|nos vemos/,
                    response: "¡Hasta luego!",
                },
                {
                    pattern: /horarios/,
                    response:
                        "Nuestros horarios son de lunes a viernes de 8:00 AM a 6:00 PM y sábados de 9:00 AM a 2:00 PM.",
                },
                {
                    pattern: /cita|agendar cita/,
                    response:
                        "Para agendar una cita, por favor llama al (123) 456-7890 o visita nuestra página web.",
                },
                {
                    pattern: /urgencias/,
                    response:
                        "Las urgencias están disponibles las 24 horas, los 7 días de la semana.",
                },
                {
                    pattern: /seguridad sanitaria|medidas de seguridad/,
                    response:
                        'Estamos tomando diversas medidas para garantizar la seguridad sanitaria, incluyendo desinfección frecuente, uso de equipos de protección personal, y protocolos de distanciamiento social. Para más detalles, visita nuestra página de "Medidas de Seguridad" en nuestra web.',
                },
            ];

            const match = rules.find((rule) =>
                rule.pattern.test(lowerCaseMessage)
            );

            if (match) {
                addMessage("bot", match.response);
            } else {
                addMessage(
                    "bot",
                    "Lo siento, no entendí tu mensaje. ¿Cómo puedo ayudarte?"
                );
            }
        }
    }
});

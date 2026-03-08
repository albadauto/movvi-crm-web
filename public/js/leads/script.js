document.querySelectorAll('.kanban-col').forEach(col => {

    new Sortable(col, {
        group: 'kanban',
        animation: 150,

        onEnd: function (evt) {

            let leadId = evt.item.dataset.id
            let acaoId = evt.to.dataset.stage

            let fromCol = evt.from.closest('.bg-white')
            let fromCount = fromCol.querySelector('.count')

            let toCol = evt.to.closest('.bg-white')
            let toCount = toCol.querySelector('.count')

            if (fromCount && toCount) {

                fromCount.textContent = parseInt(fromCount.textContent) - 1
                toCount.textContent = parseInt(toCount.textContent) + 1

            }

            fetch('/leads/mover', {

                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                body: JSON.stringify({
                    leadId: leadId,
                    acaoId: acaoId
                })

            })

        }

    })

})

<?php include "admin_header.php"; ?>
<div class="main-content">
  <!-- Heading -->
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
    <div class="mb-2 mb-md-0">
      <h4 class="fw-bold text-dark mb-1">Contact Us Messages</h4>
    </div>
  </div>

  <!-- Search Bar -->
  <div class="mb-3">
    <input type="text" id="searchBar" class="form-control theme-search shadow-sm" placeholder=" Search by name, email, or subject..." />
  </div>

  <div class="table-responsive shadow-sm rounded bg-white">
    <table class="table table-hover align-middle mb-0">
        <thead class="text-white" style="background-color: var(--primary);">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="messageTableBody">
            <!-- Data will be dynamically inserted here -->
            <?php
            include "config.php";

            $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($page - 1) * $limit;

            $totalRes = mysqli_query($con, "SELECT COUNT(*) AS total FROM contact_us_messages");
            $totalMessages = mysqli_fetch_assoc($totalRes)['total'];
            $totalPages = ceil($totalMessages / $limit);

            $query = "SELECT id, name, email, subject,status,created_at FROM contact_us_messages ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($con, $query);

            $serialNo = ($page - 1) * $limit + 1;

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $serialNo++; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['subject']); ?></td>
                    <td><?= htmlspecialchars($row['created_at']); ?></td>
                    <!-- Status Column -->
                    <td>
                        <button class="btn btn-sm toggle-status-btn 
                                    <?= ($row['status'] == 'read') ? 'btn-success' : 'btn-warning'; ?>" 
                                data-id="<?= $row['id']; ?>">
                            <?= ucfirst($row['status']); ?>
                        </button>
                    </td>

                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-secondary me-1 view-message-btn" 
                                data-id="<?= $row['id']; ?>" 
                                title="View" 
                                data-bs-toggle="modal" 
                                data-bs-target="#messageDetailModal">
                            <i class="fa fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-primary reply-btn"
                                data-id="<?= $row['id']; ?>" 
                                title="Reply" 
                                data-bs-toggle="modal" 
                                data-bs-target="#replyModal">
                            <i class="fa fa-reply"></i> Reply
                        </button>

                        <!-- Delete Button -->
                        <button class="btn btn-sm btn-outline-danger delete-btn" 
                                data-id="<?= $row['id']; ?>" 
                                title="Delete Message">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="d-flex justify-content-end mt-4">
    <ul class="pagination pagination-sm mb-0">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link text-dark" href="?page=<?= $page - 1 ?>">Prev</a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link <?= $i == $page ? 'text-white' : 'text-dark' ?>" 
                   href="?page=<?= $i ?>" 
                   style="<?= $i == $page ? 'background-color: var(--primary); border: none;' : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link text-dark" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
  </div>

  <!-- Message Detail Modal -->
  <div class="modal fade" id="messageDetailModal" tabindex="-1" aria-labelledby="messageDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content shadow rounded">
        <div class="modal-header text-white" style="background-color: #9e7fd6;">
          <h5 class="modal-title" id="messageDetailModalLabel">Message Details</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4" id="messageDetailBody">
          <div class="text-center text-muted">Loading...</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Reply Modal -->
  <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content shadow rounded">
        <div class="modal-header text-white" style="background-color: #9e7fd6;">
          <h5 class="modal-title" id="replyModalLabel">Reply to Message</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <form id="replyForm">
            <input type="hidden" name="message_id" id="message_id">
            <div class="mb-3">
              <label for="replyMessage" class="form-label">Your Reply</label>
              <textarea class="form-control" id="replyMessage" name="reply_message" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Reply</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Custom Styles -->
  <style>
    .theme-search {
      width: 100%;
      max-width: 350px;
      margin-bottom: 1rem;
    }

    .pagination .page-item.active .page-link {
      background-color: var(--primary);
      border-color: var(--primary);
      color: white;
    }

    #messageDetailBody {
      max-height: 400px;
      overflow-y: auto;
    }

    /* Add space between table, pagination, and footer */
    .table-responsive {
      margin-bottom: 30px; /* Adds space between table and pagination */
    }

    .pagination {
      margin-bottom: 30px; /* Adds space between pagination and footer */
    }

    footer {
      margin-top: 50px; /* Adjust the footer's position to give it space from the content */
    }
  </style>
  <script>
  // Search functionality
  document.getElementById("searchBar").addEventListener("input", function () {
    let searchTerm = this.value;

    // Use fetch to get HTML fragment
    fetch("search_messages.php?query=" + encodeURIComponent(searchTerm))
      .then(response => response.text())
      .then(html => {
        document.getElementById("messageTableBody").innerHTML = html;
      });
  });

  // View message button click (delegated in case content is reloaded)
  document.addEventListener("click", function (e) {
    if (e.target.closest('.view-message-btn')) {
      let messageId = e.target.closest('.view-message-btn').dataset.id;

      fetch("get_message_details.php?id=" + messageId)
        .then(response => response.text())
        .then(html => {
          document.getElementById("messageDetailBody").innerHTML = html;
        });
    }
  });
  document.addEventListener("click", function (e) {
  if (e.target.closest(".toggle-status-btn")) {
    const btn = e.target.closest(".toggle-status-btn");
    const messageId = btn.dataset.id;

    fetch("toggle_status.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: "id=" + encodeURIComponent(messageId)
    })
    .then(res => res.text())
    .then(status => {
      btn.textContent = status.charAt(0).toUpperCase() + status.slice(1);
      btn.classList.toggle("btn-success", status === "read");
      btn.classList.toggle("btn-warning", status === "unread");
    });
  }
});
document.getElementById("replyForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  fetch("send-reply.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(msg => {
    alert(msg);
    document.getElementById("replyMessage").value = "";
    const modal = bootstrap.Modal.getInstance(document.getElementById("replyModal"));
    modal.hide();
  });
});

document.addEventListener("click", function (e) {
  if (e.target.closest(".reply-btn")) {
    const messageId = e.target.closest(".reply-btn").dataset.id;
    document.getElementById("message_id").value = messageId;
  }
});
document.addEventListener("click", function (e) {
  if (e.target.closest(".delete-btn")) {
    const confirmed = confirm("Are you sure you want to delete this message?");
    if (!confirmed) return;

    const messageId = e.target.closest(".delete-btn").dataset.id;

    fetch("delete_message.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: "id=" + encodeURIComponent(messageId)
    })
    .then(res => res.text())
    .then(msg => {
      alert(msg);
      location.reload();
    });
  }
});

</script>


<?php include "admin_footer.php"; ?>
